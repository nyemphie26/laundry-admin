<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAssign;
use App\Models\LaundressAssign;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderTracker;
use App\Models\PickupAssign;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $redirect = redirect()->route("orders.list");

        return $redirect->with([
            'message'    => "Order with no $order->order_no has been scheduled",
            'success' => true,
        ]);
    }

    public function sms()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("48c1faaf", "mLZFJUYUa2scgHSm");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("6285213895226", 'SYARIF H', 'Yang, screenshot pesan ini, trus kirim ke WA aku ya')
        );
        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }

}
