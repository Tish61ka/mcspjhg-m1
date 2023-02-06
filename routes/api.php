<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/signUp', [AuthController::class, 'signUp']);
Route::post('/signIn', [AuthController::class, 'signIn']);

Route::get('/products', [ProductController::class, 'all']);

Route::group(['middleware' => 'user'], function(){
    Route::get('/cart', [CartController::class, 'all']);
    Route::post('/cart/{id}', [CartController::class, 'store']);
    Route::delete('/cart/{id}',[CartController::class, 'destroy']);

    Route::get('/order', [OrderController::class, 'all']);
    Route::post('/order', [OrderController::class, 'store']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => 'admin'], function(){

    Route::post('/product', [ProductController::class, 'store']);
    Route::patch('/product/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);
});

