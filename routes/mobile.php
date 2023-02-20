<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\HomeController;
use App\Http\Controllers\Mobile\WorkController;

Auth::routes();

Route::get('/login', function () {
    return view('Pages.Auth.login');
})->name('login');

Route::group(['middleware' => ['permission:access driver page|access employee page']], function(){
    Route::get('/',[HomeController::class, 'index'])->name('mobile.home');
    Route::get('/summary',[WorkController::class, 'summary'])->name('mobile.summary');

    Route::get('/details/{order}',[WorkController::class, 'details'])->name('mobile.details');
    Route::post('/update/{order}',[WorkController::class, 'updateStatus'])->name('mobile.updateStatus');
});

Route::group(['middleware' => ['can:access driver page']], function(){
    Route::get('/pickup',[WorkController::class, 'pickup'])->name('mobile.pickup');
    Route::get('/delivery',[WorkController::class, 'delivery'])->name('mobile.delivery');
    Route::get('/todays',[WorkController::class, 'today'])->name('mobile.today');
    Route::get('/upcoming',[WorkController::class, 'upcoming'])->name('mobile.upcoming');

});

Route::group(['middleware' => ['can:access employee page']], function(){
    Route::get('/laundry',[WorkController::class, 'laundry'])->name('mobile.laundry');

});