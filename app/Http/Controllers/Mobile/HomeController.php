<?php

namespace App\Http\Controllers\Mobile;

use App\Models\OrderAssign;
use App\Models\SocialAccount;
use App\Http\Controllers\Controller;
use App\Models\LaundressAssign;
use App\Models\PickupAssign;
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
        // $upcomingWorks = PickupAssign::where('user_id',Auth()->user()->id)->whereHas('order.schedules',function($q){
        //     $q->whereDate('schedule_date','>',date('Y-m-d'));
        // })->count();
        $upcomingWorks = $this->GetUpcomingWorks(Auth::user()->id);
        $todayWorks = $this->GetTodayWorks(Auth::user()->id);
        return view('Pages.Mobile.Home', compact('allWorks','upcomingWorks', 'todayWorks'));
    }

    public function GetTodayWorks($id)
    {
        $work = new WorkController();
        $pickup = $work->GetPickupList($id, '=')->count();
        $delivery = $work->GetDeliveryList($id, '=')->count();
        $laundry = $work->GetLaundryList($id, '=')->count();
        $total = $pickup + $delivery + $laundry;

        return $total;
    }

    public function GetUpcomingWorks($id) 
    {
        $work = new WorkController();
        $pickup = $work->GetPickupList($id, '>')->count();
        $delivery = $work->GetDeliveryList($id, '>')->count();
        $laundry = $work->GetLaundryList($id, '!=')->count();
        $total = $pickup + $delivery + $laundry;
        return $total;
    }
}
