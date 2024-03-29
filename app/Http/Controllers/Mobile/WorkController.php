<?php

namespace App\Http\Controllers\Mobile;

use GenerateStatus;
use App\Models\Order;
use App\Models\OrderAssign;
use App\Models\OrderTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\DeliveryAssign;
use App\Models\LaundressAssign;
use App\Models\PickupAssign;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function today()
    {

        $works = OrderAssign::where('user_id',Auth()->user()->id)->with(['order','order.delivery'])->whereHas('order.schedules',function($q){
            $q->whereDate('schedule_date',date('Y-m-d'));
        })->get();
        
        // return $works;
        return view('Pages.Mobile.Driver.Today', compact('works'));
    }
    
    public function pickup()
    {
        $works = $this->GetPickupList(Auth::user()->id, '=');
        return view('Pages.Mobile.Driver.Pickup', compact('works'));
    }

    public function delivery()
    {
        $works = $this->GetDeliveryList(Auth::user()->id, '=');
        return view('Pages.Mobile.Driver.Delivery', compact('works'));
    }
    
    public function upcoming()
    {
        $works = OrderAssign::where('user_id',Auth()->user()->id)->with(['order','order.delivery'])->whereHas('order.schedules',function($q){
            $q->whereDate('schedule_date','>',date('Y-m-d'));
        })->get();
        // return $works->order->getLatestStatus->status;
        return view('Pages.Mobile.Driver.Upcoming', compact('works'));
    }
    
    public function laundry()
    {
        $works = $this->GetLaundryList(Auth::user()->id, '=');
        // return $works;
        return view('Pages.Mobile.Laundryman.Laundry', compact('works'));
    }
    
    public function summary()
    {
        $works = Auth::user()->load([
            'pickupWorks' => function($query){$query->latest();},
            'deliveryWork' => function($query){$query->latest();},
            'laundryWorks' => function($query){$query->latest();}
        ]);

        // return $works;
        
        if (Auth::user()->hasRole('driver')) {
            # code...
            return view('Pages.Mobile.Driver.Summary', compact('works'));
        } else {
            # code...
            return view('Pages.Mobile.Laundryman.Summary', compact('works'));
        }
        
    }
    
    public function details(Order $order)
    {

        $latestStatus = $order->getLatestStatus->status;
        return view('Pages.Mobile.Details', compact('order','latestStatus'));
        
    }
    
    public function updateStatus(Request $request)
    {
        $file = $request->file('photoFile');
        $status = $request->input('status');
        $assign = $request->input('assign');
        $id = $request->order;
        
        switch ($status) {
            case 'picking':
                $status = 'picking';
                $state = '1';
                break;

            case 'picked':
                $status = 'pickedup';
                $state = '2';
                break;

            case 'processing':
                $status = 'processing';
                $state = '1';
                break;

            case 'processed':
                $status = 'processed';
                $state = '2';
                break;

            case 'delivering':
                $status = 'delivering';
                $state = '1';
                break;

            case 'delivered':
                $status = 'delivered';
                $state = '2';
                break;

            case 'completed':
                $status = 'completed';
                $state = '1';
                break;
                
            default:
                $status = null;
                $state = null;
                break;
        }

        switch ($assign) {
            case 'pickup':
                $update = PickupAssign::where('order_id',$id)->first();
                break;
            case 'laundry':
                $update = LaundressAssign::where('order_id',$id)->first();
                break;
            case 'delivery':
                $update = DeliveryAssign::where('order_id',$id)->first();
                break;
            
            default:
                $update = null;
                break;
        }
        
        try {
            DB::beginTransaction();
            $path = null;

            if (isset($file)) {
                $path = $file->store('courierPhotos');
            }
            OrderTracker::create([
                'order_id' => $id,
                'status' => $status,
                'image_path' => $path
            ]);

            if ($update) {
                $update->status = $state;
                $update->save();
            }

            DB::commit();

            return response()->json(['message'=> 'Stored', 'status' => 'changed to '.$status],200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['message'=>$th->getMessage()],500);
        }

        // return response()->json(['status' => $status, 'order' => $id], 200);
    }

    public function GetPickupList($id, $comp)
    {
        return PickupAssign::where('user_id',$id)->with(['order'])->whereHas('order.schedules',function($q) use ($comp) {
            $q->whereDate('schedule_date', $comp,date('Y-m-d'))->where('status','pickup');
        })->get();
    }

    public function GetDeliveryList($id, $comp)
    {
        return DeliveryAssign::where('user_id',$id)->with(['order'])->whereHas('order.schedules',function($q) use ($comp){
            $q->whereDate('schedule_date',$comp,date('Y-m-d'))->where('status','deliver');
        })->get();
    }

    public function GetLaundryList($id, $comp)
    {
        return LaundressAssign::where('user_id',$id)->with('order.pickupAssign')->whereHas('order.pickupAssign', function($q) use ($comp){
            $q->where('status', $comp ,'2');
        })
        ->where('status','!=','2')
        ->get();
    }
}
