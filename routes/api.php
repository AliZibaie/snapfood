<?php

use App\Http\Controllers\Api\Address\AddressController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Cart\CartController;
use App\Http\Controllers\Api\Comment\CommentController;
use App\Http\Controllers\Api\Payment\PaymentController;
use App\Http\Controllers\Api\Restaurant\RestaurantController;
use App\Http\Controllers\Api\Food\FoodController;
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
//Route::middleware('auth:sanctum')->group(function (){
//    Route::post('logout', [AuthController::class,'logout']);
//    Route::apiResource('users', ProfileController::class);
//    Route::post('users/{user}', [ProfileController::class, 'update']);
//    Route::apiResource('addresses', AddressController::class);
//    Route::patch('addresses/{address}', [AddressController::class, 'setAddress']);
//    Route::post('addresses/{address}', [AddressController::class, 'update']);
//    Route::apiResource('restaurants', RestaurantController::class);
//    Route::apiResource('restaurants/{restaurant}/foods', FoodController::class);
//    Route::apiResource('carts', CartController::class);
//    Route::post('carts/{cart}', [CartController::class, 'update']);
//    Route::post('carts/{cart}/pay', [PaymentController::class, 'store']);
//});
//Route::post('login', [AuthController::class,'login']);
//Route::post('register', [AuthController::class,'register']);
Route::prefix('v1')->group(function (){
Route::middleware('auth:sanctum')->group(function (){
    Route::post('logout', [AuthController::class,'logout']);
    Route::apiResource('users', ProfileController::class);
    Route::post('users/{user}', [ProfileController::class, 'update']);
    Route::apiResource('addresses', AddressController::class);
    Route::patch('addresses/{address}', [AddressController::class, 'setAddress']);
    Route::post('addresses/{address}', [AddressController::class, 'update']);
    Route::apiResource('restaurants', RestaurantController::class);
    Route::get('restaurants/{restaurant}/foods', [FoodController::class, 'index']);
    Route::apiResource('carts', CartController::class);
    Route::post('carts/{cart}', [CartController::class, 'update']);
    Route::post('carts/{cart}/pay', [PaymentController::class, 'store']);
    Route::post('comments', [CommentController::class, 'store']);
    Route::get('comments', [CommentController::class, 'index']);
});
    Route::post('login', [AuthController::class,'login']);
    Route::post('register', [AuthController::class,'register']);
});
