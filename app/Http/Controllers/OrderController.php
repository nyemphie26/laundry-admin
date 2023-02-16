<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderAssign;
use App\Models\OrderTracker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function incoming()
    {
        $orders = Order::whereHas('getLatestStatus', function($q){$q->where('status','placed');})->with(['cust','details'])->get();
        return view('Pages.Orders.incoming', compact('orders'));
    }
    
    public function index()
    {
        $orders = Order::with(['getLatestStatus','cust','details'])->get();
        return view('Pages.Orders.orders', compact('orders'));
    }
    
    public function details(Order $order)
    {
        $incoming = null;
        if($order->getLatestStatus->status == 'placed')
        {
            $incoming = true;
        }
        $drivers = User::role('driver')->get();
        $employees = User::role('employee')->get();
        return view('Pages.Orders.details', compact('order','drivers','employees','incoming'));
    }

    public function accept(Order $order, Request $request)
    {
        $assigns = [
            [
                "order_id"  => $order->id,
                "user_id"   => $request['choiced-driver'],
                "status"    => 'picker',
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now(),
            ],
            [
                "order_id"  => $order->id,
                "user_id"   => $request['choiced-employee'],
                "status"    => 'washer',
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now(),
            ]
        ];
        
        DB::transaction(function() use($assigns, $order){
            OrderAssign::insert($assigns);
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

}
