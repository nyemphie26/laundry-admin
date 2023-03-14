<?php

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Models\Category;
use App\Models\Order;

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
Auth::routes();

Route::get('/login', function () {
    return view('Pages.Auth.login');
})->name('login');


Route::get('/', [HomeController::class, 'index'])->name('dashboard.main');

//Account
Route::get('/account', [UserController::class, 'profile'])->name('account.settings');
Route::put('/account/{user}', [UserController::class, 'updateProfile'])->name('account.settings.update');
Route::put('/account/password/{user}', [UserController::class, 'updatePassword'])->name('account.settings.updatePass');


Route::group(['middleware' => ['can:access admin page']], function(){
    
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
    
    
    //Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.list');
    Route::get('/orders/details/{order}', [OrderController::class, 'details'])->name('orders.list.details');
    
    Route::get('/incoming', [OrderController::class, 'incoming'])->name('orders.incoming');
    Route::get('/incoming/details/{order}', [OrderController::class, 'details'])->name('orders.incoming.details');
    Route::get('/assigning', [OrderController::class, 'assigning'])->name('orders.assigning');
    Route::get('/assigning/details/{order}', [OrderController::class, 'details'])->name('orders.assigning.details');
    Route::post('/orders/{order}', [OrderController::class, 'accept'])->name('orders.accept');
    Route::post('/delivery/{order}', [OrderController::class, 'delivery'])->name('orders.delivery');
    
    Route::get('/incoming/details', function (){
        return view('Pages.Orders.details');
    })->name('dashboard.orders.details');
    
    //Services & Categories
    Route::resource('products', ProductController::class)->only('index');
    Route::resource('category', CategoryController::class)->only('create','edit','store','update','destroy');
    Route::resource('service', ServiceController::class)->only('create','edit','store','update','destroy');
    Route::get('/fetchCategory', [CategoryController::class, 'fetchCategory'])->name('fetchCategory');

    //Users
    Route::get('/customers', function (){
        return view('Pages.Users.customers');
    })->name('users.customers');
    

    Route::get('/employees',[UserController::class, 'employee'] )->name('users.employees');
    Route::get('/employees/create',[UserController::class, 'createEmployee'] )->name('users.employees.new');
    Route::post('/employees/store',[UserController::class, 'storeEmployee'] )->name('users.employees.store');
    Route::get('/employees/{user}/edit',[UserController::class, 'editEmployee'] )->name('users.employees.edit');
    Route::put('/employees/{user}',[UserController::class, 'updateEmployee'] )->name('users.employees.update');
    
    //internal API for javascript fetch
    Route::post('/status/postal',[DashboardController::class, 'storePostal'])->name('postal.store');
    Route::post('/status/postalUpdate/{postal}',[DashboardController::class, 'updatePostal'])->name('postal.update');
    Route::post('/status/tax',[DashboardController::class, 'storeTax'])->name('tax.store');
    Route::post('/status/offDay',[DashboardController::class, 'storeOffDay'])->name('offDay.store');
    Route::delete('/status/offDay/{offDay}',[DashboardController::class, 'destroyOffDay'])->name('offDay.destroy');
    Route::post('/status/operational',[DashboardController::class, 'storeOperational'])->name('operational.store');
    Route::post('/status/pickupSchedule',[DashboardController::class, 'storePickupSchedule'])->name('schedule.store');
});


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
    Artisan::call('db:seed', ['--force' => true]);
  });
