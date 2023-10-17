<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Schedule;
use Illuminate\Support\Str;
use App\Notifications\IncomingOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\OrderController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;

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
})->middleware('guest')->name('login');

Route::get('/reset-password/{token}', function(string $token){
    return view('Pages.Auth.reset-password', ['token'=>$token]);
})->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? view('Pages.Auth.reset-success', ['status'=> __($status)])
                : view('Pages.Auth.reset-failed', ['status'=> __($status)]);
                // : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');

Route::get('/success-reset-pass', function(){
    return view('Pages.Auth.reset-success');
})->name('password.reset.success');

Route::get('/', [HomeController::class, 'index'])->name('dashboard.main');
// Route::get('/smsTest', [OrderController::class, 'testSms']);
// Route::get('/accountTest', [OrderController::class, 'testAccount']);
// Route::get('/smsStatus/{id}', [OrderController::class, 'statusSms']);

//Account
Route::get('/account', [UserController::class, 'profile'])->name('account.settings');
Route::put('/account/{user}', [UserController::class, 'updateProfile'])->name('account.settings.update');
Route::put('/account/password/{user}', [UserController::class, 'updatePassword'])->name('account.settings.updatePass');

Route::get('stripe-success', function(){
    return view('Pages.Stripe.checkout_success');
})->name('stripe-success');
Route::get('stripe-cancel', function(){
    return view('Pages.Stripe.checkout_cancel');
})->name('stripe-cancel');

Route::group(['middleware' => ['can:access admin page']], function(){
    
    //Landing Page
    Route::get('/main-page', [LandingPageController::class, 'index'])->name('landingpage.main');
    Route::post('/main-page', [LandingPageController::class, 'storeValue'])->name('landingpage.store');
    Route::get('/about', [LandingPageController::class, 'about'])->name('landingpage.about');
    Route::post('/about', [LandingPageController::class, 'storeValue'])->name('about.store');
    Route::get('/contact', [LandingPageController::class, 'contact'])->name('landingpage.contact');
    Route::post('/contact', [LandingPageController::class, 'storeValue'])->name('contact.store');
    Route::get('/services', [LandingPageController::class, 'services'])->name('landingpage.services');
    Route::post('/services', [LandingPageController::class, 'storeValue'])->name('services.store');
    
    //Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.list');
    Route::get('/orders/details/{order}', [OrderController::class, 'details'])->name('orders.list.details');
    
    Route::get('/incoming', [OrderController::class, 'incoming'])->name('orders.incoming');
    Route::get('/incoming/details/{order}', [OrderController::class, 'details'])->name('orders.incoming.details');
    Route::get('/assigning', [OrderController::class, 'assigning'])->name('orders.assigning');
    Route::get('/assigning/details/{order}', [OrderController::class, 'details'])->name('orders.assigning.details');
    Route::post('/orders/{order}', [OrderController::class, 'accept'])->name('orders.accept');
    Route::post('/delivery/{order}', [OrderController::class, 'delivery'])->name('orders.delivery');
    
    //Services & Categories
    Route::resource('products', ProductController::class)->only('index');
    Route::resource('category', CategoryController::class)->only('create','edit','store','update','destroy');
    Route::resource('service', ServiceController::class)->only('create','edit','store','update','destroy');
    Route::get('/fetchCategory', [CategoryController::class, 'fetchCategory'])->name('fetchCategory');

    //Users
    Route::get('/customers', [UserController::class, 'customers'])->name('users.customers');
    Route::get('/customers/{user}/edit',[UserController::class, 'editCustomer'] )->name('users.customers.edit');
    Route::put('/customers/{user}',[UserController::class, 'updateCustomer'] )->name('users.customers.update');
    
    //Report
    Route::get('/summary', [ReportController::class, 'index'])->name('summary.index');
    Route::post('/summary', [ReportController::class, 'show'])->name('summary.show');
    Route::get('/summaryPdf/{start}/{end}', [ReportController::class, 'generatePdf'])->name('summary.pdf');
    Route::get('/report/orders', [ReportController::class, 'orders'])->name('report.orders');
    Route::get('/report/finance', [ReportController::class, 'finance'])->name('report.finance');

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
    Route::get('/dailyOrders',[DashboardController::class, 'dailyOrders']);
    Route::get('/lastRevenue',[DashboardController::class, 'lastRevenue']);
    Route::get('/lastCust',[DashboardController::class, 'lastCust']);

    //sendEmail
    // Route::get('/sendEmail/{order}',function(string $orderid){
    //     $order = Order::findOrFail($orderid);
    //     // return Notification::route('mail',env('MAIL_RECEIVER_FOR_INCOMING_ORDER'))->notify(new IncomingOrder($order));
    //     return (new IncomingOrder($order))->toMail($order->user);
    // });
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
