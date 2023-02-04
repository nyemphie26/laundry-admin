<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('Pages.Auth.login');
})->name('login');

Route::get('/', [HomeController::class, 'index'])->name('dashboard.main');

//Account
Route::get('/account', [UserController::class, 'profile'])->name('account.settings');
Route::put('/account/{user}', [UserController::class, 'updateProfile'])->name('account.settings.update');
Route::put('/account/password/{user}', [UserController::class, 'updatePassword'])->name('account.settings.updatePass');

// Route::get('/account', function () {
//     return view('Pages.Account.settings');
// })->name('account.settings');

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
    Route::get('/orders', function (){
        return view('Pages.Orders.orders');
    })->name('orders.list');
    
    Route::get('/incoming', function (){
        return view('Pages.Orders.incoming');
    })->name('orders.incoming');
    
    Route::get('/details', function (){
        return view('Pages.Orders.details');
    })->name('dashboard.orders.details');
    
    Route::get('/incoming/details', function (){
        return view('Pages.Orders.details');
    })->name('dashboard.incoming.details');
    
    //Services & Categories
    Route::resource('products', ProductController::class)->only('index');
    Route::resource('category', CategoryController::class)->only('create','edit','store','update');
    Route::resource('service', ServiceController::class)->only('create','edit','store','update');


    // Route::get('/products', function (){
    //     return view('Pages.Products.index');
    // })->name('products');
    
    // Route::get('/products/category', function (){
    //     return view('Pages.Products.category-new');
    // })->name('products.category.new');
    
    // Route::get('/products/category/edit', function (){
    //     return view('Pages.Products.category-edit');
    // })->name('products.category.edit');
    
    // Route::get('/products/service', function (){
    //     return view('Pages.Products.service-new');
    // })->name('products.service.new');
    
    // Route::get('/products/service/edit', function (){
    //     return view('Pages.Products.service-edit');
    // })->name('products.service.edit');
    
    //Users
    Route::get('/customers', function (){
        return view('Pages.Users.customers');
    })->name('users.customers');
    

    Route::get('/employees',[UserController::class, 'employee'] )->name('users.employees');
    Route::get('/employees/create',[UserController::class, 'createEmployee'] )->name('users.employees.new');
    Route::post('/employees/store',[UserController::class, 'storeEmployee'] )->name('users.employees.store');
    Route::get('/employees/{user}/edit',[UserController::class, 'editEmployee'] )->name('users.employees.edit');
    Route::put('/employees/{user}',[UserController::class, 'updateEmployee'] )->name('users.employees.update');
    
});

Route::group(['middleware' => ['can:access driver page']], function(){

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
