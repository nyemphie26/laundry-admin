<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CategoryResource;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\v1\OrderController;
use App\Http\Controllers\Api\v1\StripeController;
use App\Http\Controllers\Api\v1\ServiceController;
use App\Http\Controllers\Api\v2\LandingPageController;
use App\Http\Controllers\Api\v1\BookScheduleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){

    // Route::post('/token/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'index']);
    Route::post('/regularLogin', [LoginController::class, 'regularLogin']);
    Route::post('/register', [LoginController::class, 'register']);
    Route::post('/resetPassword', [LoginController::class, 'resetPassword']);

    Route::get('/categories', function(){
        return CategoryResource::collection(Category::all());
    });
    Route::get('/category/{slug}', function($slug){
        // return Category::where('slug',$slug)->first();
        return new CategoryResource(Category::where('slug',$slug)->first());
    });
    Route::apiResource('/services', ServiceController::class)->only('index');
    Route::apiResource('/schedules/{dateNow}/{long}', BookScheduleController::class)->only('index');
    

    Route::middleware('auth:sanctum')->group(function (){
        Route::post('/logout', [LoginController::class, 'destroy']);
        
        Route::apiResource('/orders', OrderController::class)->only('index','store', 'show');
        Route::get('/active_orders', [OrderController::class, 'activeOrders']);
        
        Route::post('/create-checkout-page', [StripeController::class, 'checkoutPage']);
        Route::post('/retrieve-checkout-page', [StripeController::class, 'retrieveCheckout']);

        Route::put('/profile/{user}', [UserController::class, 'update']);
        
    });
});

Route::prefix('v2')->group(function(){
    Route::get('landing-page', [LandingPageController::class, 'homePage']);
    Route::get('about-page', [LandingPageController::class, 'about']);
    Route::get('contact-page', [LandingPageController::class, 'contact']);
    Route::get('service-page/{slug}', [LandingPageController::class, 'service']);
    Route::get('footer', [LandingPageController::class, 'footer']);
});
