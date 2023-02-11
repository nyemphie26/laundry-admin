<?php

use App\Http\Controllers\Api\v1\ServiceController;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::get('/categories', function(){
        return CategoryResource::collection(Category::all());
    });
    Route::get('/category/{slug}', function($slug){
        // return Category::where('slug',$slug)->first();
        return new CategoryResource(Category::where('slug',$slug)->first());
    });
    Route::apiResource('/services', ServiceController::class)->only('index');
});
