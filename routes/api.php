<?php

use App\Http\Controllers\Api\Address\AddressController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Restaurant\RestaurantController;
use App\Http\Controllers\Api\User\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->group(function (){
    Route::post('logout', [AuthController::class,'logout']);
    Route::apiResource('users', ProfileController::class);
    Route::apiResource('addresses', AddressController::class);
    Route::patch('addresses/{address}', [AddressController::class, 'setAddress']);
    Route::put('addresses/{address}', [AddressController::class, 'update']);
    Route::apiResource('restaurants', RestaurantController::class);
});
Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
