<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Schedule;
use App\Models\OrderTracker;
use App\Models\PickupAssign;
use Illuminate\Http\Request;
use App\Models\DeliveryAssign;
use App\Models\LaundressAssign;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function incoming()
    {
        $orders = Order::whereHas('getLatestStatus', function($q){$q->where('status','placed');})->with(['cust','details'])->get();
        return view('Pages.Orders.incoming', compact('orders'));
    }
    
    public function assigning()
    {
        $orders = Order::whereHas('getLatestStatus', function($q){$q->where('status','processed');})->with(['cust','details'])->get();
        return view('Pages.Orders.assigning', compact('orders'));
    }
    
    public function index()
    {
        $orders = Order::with(['getLatestStatus','cust','details'])->get();
        return view('Pages.Orders.orders', compact('orders'));
    }
    
    public function details(Order $order)
    {
        $incoming = null;
        $latestStatus = $order->getLatestStatus->status;
        if($latestStatus == 'placed')
        {
            $incoming = 'incoming';
        }
        elseif ($latestStatus == 'processed') {
            $incoming = 'finished';
        }
        
        $drivers = User::role('driver')->get();
        $employees = User::role('employee')->get();
        return view('Pages.Orders.details', compact('order','drivers','employees','incoming'));
    }

    public function accept(Order $order, Request $request)
    {

        DB::transaction(function() use($request, $order){
            // OrderAssign::insert($assigns);
            PickupAssign::create([
                "order_id"  => $order->id,
                "user_id"   => $request['choiced-driver'],
                "status"    => '0'
            ]);
            LaundressAssign::create([
                "order_id"  => $order->id,
                "user_id"   => $request['choiced-employee'],
                "status"    => '0'
            ]);
            OrderTracker::create([
                'order_id' => $order->id,
                'status' => 'accepted'
            ]);
            
        });
        // return $order;

        $redirect = redirect()->route("orders.incoming");

        return $redirect->with([
            'message'    => "Order with no $order->order_no has been accepted",
            'success' => true,
        ]);
    }

    public function delivery(Order $order, Request $request)
    {
        $err = null;
        DB::transaction(function() use($request,$order){
            
            Schedule::create([
                'order_id' => $order->id,
                'schedule_date' => $request['delivery_date'],
                'status' => 'deliver',
            ]);
            OrderTracker::create([
                'order_id' => $order->id,
                'status' => 'scheduled'
            ]);
            DeliveryAssign::create([
                "order_id"  => $order->id,
                "user_id"   => $request['choiced-driver'],
                "status"    => '0'
            ]);

        });
        
        $sendSms = $this->sendSms($order,$request['delivery_date']);
        if ($sendSms['status']!=1004) {
            $err = 'SMS '.$sendSms['status_text'];
        } 
        
        $redirect = redirect()->route("orders.list");

        return $redirect->with([
            'message'    => "Order with no $order->order_no has been scheduled -- ".$err??'',
            'success' => true,
        ]);
    }

    public function sms()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("48c1faaf", "mLZFJUYUa2scgHSm");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("6281373875234", 'WashPress', 'Your Order #123 will delivered on 17 April, 2023')
        );
        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

    public function sendSms(Order $order, $deliveryDate)
    {   
        $url = 'https://www.5centsms.com.au/api/v4/sms';
        $message = 'Hi There! Your Order #'.$order->order_no.' will ship on'.date('l, d F y',strtotime($deliveryDate));

	    $fields = array(
            'sender' => urlencode(config('services.5csms.sender')),
            'to' => urlencode($order->delivery->phone),
            'message' => urlencode($message),
            'test' => urlencode('false'),
        );  
        
        $fields_string = "";
        foreach($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'User: '.config('services.5csms.user'),
            'Api-Key: '.config('services.5csms.api-key'),
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result, true);
        return $response['messages'][0];
    }

    public function testAccount()
    {
        $url = 'https://www.5centsms.com.au/api/v4/account'; 

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'User: '.config('services.5csms.user'),
            'Api-Key: '.config('services.5csms.api-key'),
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result, true);
        return $response;
    }

    public function testSms()
    {
        $url = 'https://www.5centsms.com.au/api/v4/sms';
        $message = 'Hi There! Your Order xxx will ship on --date--';
        $phone = '6281373875234';

	    $fields = array(
            'sender' => urlencode(config('services.5csms.sender')),
            'to' => urlencode($phone),
            'message' => urlencode($message),
            'test' => urlencode('true'),
        );  
        
        $fields_string = "";
        foreach($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'User: '.config('services.5csms.user'),
            'Api-Key: '.config('services.5csms.api-key'),
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result, true);
        return $response['messages'][0]['id'];
        //1602 -> failed destination
        //1004 -> success

        // $url = 'https://www.5centsms.com.au/api/v4/sms';

	    // $fields = array(
        //     'sender' => urlencode('0450888000'),
        //     'to' => urlencode('0404888802'),
        //     'message' => urlencode('This Message is sent from application and 0450. Cheers'),
        //     'test' => urlencode('false'),
        // );  
        // $fields_string = "";
        // foreach($fields as $key => $value) {
        //     $fields_string .= $key . '=' . $value . '&';
        // }
        // rtrim($fields_string, '&');

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'User: '.config('services.5csms.user'),
        //     'Api-Key: '.config('services.5csms.api-key'),
        // ));

        // $result = curl_exec($ch);
        // curl_close($ch);

        // $response = json_decode($result, true);
        // return $response;
    }

    public function statusSms(Request $request)
    {
        $id = $request->id;
        $url = 'https://www.5centsms.com.au/api/v4/sms/'.$id;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'User: '.config('services.5csms.user'),
        'Api-Key: '.config('services.5csms.api-key'),
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result, true);
        return $response;
    }

}
