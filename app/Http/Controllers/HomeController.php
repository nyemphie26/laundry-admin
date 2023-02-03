<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if (Auth::user()->hasPermissionTo('access admin page')) {
            return view('Pages.dashboard');
        } else {
            return view('Pages.Mobile.MobileHome');
        }
        
    }
}
