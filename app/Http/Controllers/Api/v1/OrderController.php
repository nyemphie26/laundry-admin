<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Order;
use App\Models\Delivery;
use App\Models\Schedule;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\OrderTracker;
use App\Notifications\IncomingOrder;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::with(['details','delivery','assigns','trackers','schedules'])->where('user_id', auth()->user()->id)->latest('created_at')->paginate(5);
        return OrderResource::collection($data);
    }
    
    public function activeOrders()
    {
        $data = Order::where('user_id', auth()->user()->id)
                    ->whereHas('getLatestStatus', function($q){
                        $q->where('status','!=','completed');
                            // ->where('status','!=','delivered');
                    })
                    ->latest('created_at')
                    ->get();
        return OrderResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array_items = json_decode($request->items,true);
        $array_delivery = json_decode($request->delivery,true);
        // return response()->json(['message'=> $array_delivery['address']],200);
        try {
            DB::beginTransaction();

                $newOrder = new Order();
                $newOrder->user_id = auth()->user()->id;
                $newOrder->total = $request->total;
                $newOrder->tax = $request->tax;
                $newOrder->grand_total = $request->grand_total;
                $newOrder->save();

                $newSchedule = new Schedule();
                $newSchedule->order_id = $newOrder->id;
                $newSchedule->schedule_date = $request->schedule_date;
                $newSchedule->status = 'pickup';
                $newSchedule->save();

                foreach ($array_items as $key => $value) {
                    $newDetails = new OrderDetails();
                    $newDetails->order_id = $newOrder->id;
                    $newDetails->sku = $value['sku'];
                    $newDetails->item = $value['name'];
                    $newDetails->price = $value['price'];
                    $newDetails->qty = $value['qty'];
                    $newDetails->subtotal = $value['subtotal'];
                    $newDetails->save();
                }

                $newDelivery = new Delivery();
                $newDelivery->order_id  = $newOrder->id;
                $newDelivery->user_id   = auth()->user()->id;
                $newDelivery->name      = $array_delivery['name'];
                $newDelivery->phone     = $array_delivery['phone'];
                $newDelivery->email     = $array_delivery['email'];
                $newDelivery->address   = $array_delivery['address'];
                $newDelivery->save();

                $newTracker = new OrderTracker();
                $newTracker->order_id = $newOrder->id;
                $newTracker->status = 'placed';
                $newTracker->save();
            
            DB::commit();
            
            Notification::route('mail',env('MAIL_RECEIVER_FOR_INCOMING_ORDER'))->notify(new IncomingOrder($newOrder));
            return response()->json(['message'=> 'Stored'],200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['message'=>$th->getMessage()],500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new OrderResource(
            Order::with(['details','delivery','assigns','trackers','schedules'])
                    ->where('order_no', $id)
                    ->where('user_id', auth()->user()->id)
                    ->first()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
