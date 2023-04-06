<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\User;
use App\Models\Order;
use App\Models\OffDay;
use App\Models\Postal;
use App\Models\StoreDay;
use App\Models\StoreHour;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function storePostal(Request $request)
    {
        $postal = $request->input('postal');
        try {
            //code...
            Postal::create([
                'postal_code'   => $postal,
                'status'        => '1',
            ]);
            return response()->json(['message'=>$postal.' been added'],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>$th->getMessage()],500);
        }
    }
    
    public function updatePostal(Request $request)
    {
        $postal = $request->postal;
        $status = $request->input('status');
        try {
            //code...
            $update = Postal::where('postal_code',$postal)->first();
            $update->status = $status;
            $update->save();
            return response()->json(['message'=>$postal.' been updated'],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>$th->getMessage()],500);
        }
    }

    public function storeTax(Request $request)
    {
        $percent = $request->input('tax');
        $tax = $percent/100;
        try {
            //code...
            Tax::create([
                'tax'   => $tax,
            ]);
            return response()->json(['message'=>$tax.' been added'],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>$th->getMessage()],500);
        }
    }

    public function storeOffDay(Request $request)
    {
        $date = $request->input('date');
        try {
            //code...
            OffDay::create([
                'date'   => $date,
            ]);
            return response()->json(['message'=>$date.' been added as your holiday'],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>$th->getMessage()],500);
        }
    }

    public function destroyOffDay($id)
    {
        $date = $id;
        try {
            //code...
            OffDay::destroy($date);
            return response()->json(['message'=>$date.' been removed as your holiday'],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>$th->getMessage()],500);
        }
    }
    
    public function storeOperational(Request $request)
    {
        $days = json_decode($request->input('days'));
        $hourFrom = $request->input('hourFrom');
        $hourUntil = $request->input('hourUntil');
        // return response()->json(['message'=>$days],200);
        try {
            StoreDay::whereNotIn('day',$days)->delete();
            
            foreach ($days as $key => $value) {
                StoreDay::updateOrInsert(['day'=>$value],['day'=>$value]);
            }
            StoreHour::updateOrCreate(['key'=>'operational'],['hourFrom'=>$hourFrom, 'hourUntil'=>$hourUntil]);
            return response()->json(['message'=>'Operational Store been updated'],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>$th->getMessage()],500);
        }
    }
    
    public function storePickupSchedule(Request $request)
    {
        $morningFrom = $request->input('morningFrom');
        $morningUntil = $request->input('morningUntil');
        $afternoonFrom = $request->input('afternoonFrom');
        $afternoonUntil = $request->input('afternoonUntil');
        // return response()->json(['message'=>$days],200);
        try {
            StoreHour::upsert([
                ['key' => 'morningSchedule', 'hourFrom' => $morningFrom, 'hourUntil' => $morningUntil],
                ['key' => 'afternoonSchedule', 'hourFrom' => $afternoonFrom, 'hourUntil' => $afternoonUntil]
            ], ['key'], ['hourFrom', 'hourUntil']);

            return response()->json(['message'=>'Pickup and Delivery Schedule been updated'],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>$th->getMessage()],500);
        }
        
    }

    public function dailyOrders()
    {
        $data =  Order::selectRaw('
                            DATE_FORMAT(created_at, "%a") AS date,
                            COUNT(id) AS orders
                        ')
                        ->whereDate('created_at','like', date('Y-m').'%')
                        ->groupBy('date')
                        ->get()
                        ->pluck('orders','date');
        
        return response()->json(['data'=>$data]);
    }

    public function lastRevenue()
    {
        $data = Order::selectRaw('
                            DATE_FORMAT(created_at, "%b") AS date,
                            COUNT(id) AS orders,
                            ROUND(SUM(grand_total),2) AS revenue
                        ')
                        ->whereDate('created_at','like', date('Y').'%')
                        ->groupBy('date')
                        ->get()
                        ->pluck('revenue','date');
        return response()->json(['data'=>$data]);
    }
    
    public function lastCust()
    {
        $data = User::role(['user'])
                    ->selectRaw('
                            DATE_FORMAT(created_at, "%b") AS date,
                            COUNT(id) AS customers
                        ')
                    ->whereDate('created_at','like', date('Y').'%')
                    ->groupBy('date')
                    ->get()
                    ->pluck('customers','date');
        return response()->json(['data'=>$data]);
    }
}
