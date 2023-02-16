<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Order;
use App\Models\Delivery;
use App\Models\Schedule;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\OrderTracker;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::with(['details','delivery','assigns','trackers','schedules'])->where('user_id', auth()->user()->id)->get();
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

                foreach ($request->items as $key => $value) {
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
                $newDelivery->name      = $request->delivery['name'];
                $newDelivery->phone     = $request->delivery['phone'];
                $newDelivery->email     = $request->delivery['email'];
                $newDelivery->address   = $request->delivery['address'];
                $newDelivery->save();

                $newTracker = new OrderTracker();
                $newTracker->order_id = $newOrder->id;
                $newTracker->status = 'placed';
                $newTracker->save();

            DB::commit();

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
        //
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
