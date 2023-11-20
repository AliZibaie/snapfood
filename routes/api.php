<?php

use App\Http\Controllers\Api\Auth\AuthController;
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

Route::middleware('auth:sanctum')->group( function () {
    Route::post('logout', [AuthController::class,'logout']);
    Route::patch('users/update', [ProfileController::class,'update']);
    Route::delete('users/destroy', [ProfileController::class,'destroy']);
});
Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
