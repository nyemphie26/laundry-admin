<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\Order;
use App\Models\OffDay;
use App\Models\Postal;
use App\Models\StoreDay;
use App\Models\StoreHour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = Http::get('https://mocki.io/v1/1f67bfff-d4b0-4483-a553-269a5affcf20');
        $collection = json_decode($response);
        // return $response['description'];
        if (Auth::user()->hasRole('admin')) {
           $postals = Postal::all();
           $taxes = Tax::latest('created_at')->get();
           $offDays = OffDay::latest('date')->get();
           $storeDays = StoreDay::all();
           $storeHour = StoreHour::all()->keyBy('key');
           $orders = Order::with('getLatestStatus')->get();
        //    return $orders;
            return view('Pages.dashboard', compact([
                                                'postals',
                                                'taxes',
                                                'offDays',
                                                'storeDays',
                                                'storeHour',
                                                'orders',
                                            ]));
        } 
        elseif(Auth::user()->hasAnyRole(['employee','driver'])){
            return redirect()->route('mobile.home');
        }
        else {
            return view('Pages.Mobile.Customer.Home');
        }
        
    }
}
