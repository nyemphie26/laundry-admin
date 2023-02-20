<?php

namespace App\Http\Controllers\Mobile;

use App\Models\OrderAssign;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $allWorks = Auth::user()->loadCount(['pickupWorks as Pick','laundryWorks as Laundry','deliveryWork as Delivery']);
        $completeWorks = Auth::user()->loadCount([
            'pickupWorks as CompletePick'=> function($q){$q->where('status','2');},
            'laundryWorks as CompleteLaundry'=> function($q){$q->where('status','2');},
            'deliveryWork as CompleteDelivery'=> function($q){$q->where('status','2');},
        ]);
        $upcomingWorks = OrderAssign::where('user_id',Auth()->user()->id)->whereHas('order.schedules',function($q){
            $q->whereDate('schedule_date','>',date('Y-m-d'));
        })->count();

        // return $allWorks;
        return view('Pages.Mobile.Home', compact('allWorks','upcomingWorks'));
    }
}
