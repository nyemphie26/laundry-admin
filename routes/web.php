<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Pages.dashboard');
})->name('dashboard.main');

//Landing Page
Route::get('/main-page', function () {
    return view('Pages.LandingPage.mainPage');
})->name('landingpage.main');
Route::get('/about', function () {
    return view('Pages.LandingPage.about');
})->name('landingpage.about');
Route::get('/contact', function () {
    return view('Pages.LandingPage.contact');
})->name('landingpage.contact');

//Account
Route::get('/account', function () {
    return view('Pages.Account.settings');
})->name('account.settings');

//Orders
Route::get('/orders', function (){
    return view('Pages.Orders.orders');
})->name('dashboard.orders');

Route::get('/incoming', function (){
    return view('Pages.Orders.incoming');
})->name('dashboard.incoming');

Route::get('/details', function (){
    return view('Pages.Orders.details');
})->name('dashboard.orders.details');

Route::get('/incoming/details', function (){
    return view('Pages.Orders.details');
})->name('dashboard.incoming.details');

//Services
Route::get('/services', function (){
    return view('Pages.Services.products-list');
})->name('services.products');

Route::get('/services/create', function (){
    return view('Pages.Services.products-new');
})->name('services.products.create');

Route::get('/services/edit', function (){
    return view('Pages.Services.products-edit');
})->name('services.products.edit');

//Customer


Route::get('migrate',function(){
    Artisan::call('migrate', ['--force' => true]);
});

Route::get('/rollback',function(){
    Artisan::call('migrate:rollback', ['--force' => true]);
 });

 Route::get('/reboot',function(){
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('key:generate', ['--force' => true]);
  });

  Route::get('/seed', function(){
    Artisan::call('db:seed', array('--class' => 'PermissionsAssign', '--force' => true));
  });