<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Auth::routes();


// Route::get('/', [HomeController::class, 'index'])->name('dashboard.main');
Route::get('/', function(){
    return view('home.blade.php');
});

Route::get('/services', function () {
    return view('Pages.Mobile.Customer.Services');
})->name('mobile.services');

Route::get('/cart', function () {
    return view('Pages.Mobile.Customer.Cart');
})->name('mobile.cart');