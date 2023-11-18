<?php


use App\Http\Controllers\Seller\FoodController;
use App\Http\Controllers\Seller\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'stop_seller'])->group(function (){
    Route::get('panel/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('panel/restaurants/create', [RestaurantController::class, 'store'])->name('restaurants.store');
});

Route::middleware('role:seller')->group(function (){
    Route::resource('panel/restaurants',RestaurantController::class)->except(['create', 'store']);
    Route::resource('panel/foods',FoodController::class);
});
