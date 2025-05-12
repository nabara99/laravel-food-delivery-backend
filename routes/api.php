<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/user/register', [AuthController::class, 'userRegister']);
Route::post('/restaurant/register', [AuthController::class, 'restaurantRegister']);
Route::post('/driver/register', [AuthController::class, 'driverRegister']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::put('/user/update-latlong', [AuthController::class, 'updateLatLong'])->middleware('auth:sanctum');
Route::get('/restaurant', [AuthController::class, 'getRestaurant'])->middleware('auth:sanctum');

Route::apiResource('/products', ProductController::class)->middleware('auth:sanctum');

Route::post('/order', [OrderController::class, 'createOrder'])->middleware('auth:sanctum');
Route::get('/order/user', [OrderController::class, 'orderHistory'])->middleware('auth:sanctum');
Route::get('/order/restaurant', [OrderController::class, 'getOrderByStatus'])->middleware('auth:sanctum');
Route::get('/order/driver', [OrderController::class, 'getOrderByStatusDriver'])->middleware('auth:sanctum');
Route::put('/order/restaurant/update-status/{id}', [OrderController::class, 'updateOrderStatus'])->middleware('auth:sanctum');
Route::put('/order/driver/update-status/{id}', [OrderController::class, 'updateOrderStatusDriver'])->middleware('auth:sanctum');
Route::put('/order/user/update-status/{id}', [OrderController::class, 'updatePurchaseStatus'])->middleware('auth:sanctum');

Route::get('restaurant/{userId}/products', [ProductController::class, 'getProductByUserId'])->middleware('auth:sanctum');
