<?php


use App\Http\Controllers\Seller\AddressController;
use App\Http\Controllers\Seller\FoodController;
use App\Http\Controllers\Seller\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'stop_seller'])->group(function (){
    Route::get('panel/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('panel/restaurants/create', [RestaurantController::class, 'store'])->name('restaurants.store');
});

Route::middleware(['auth', 'role:seller'])->group(function (){
    Route::resource('panel/restaurants',RestaurantController::class)->except(['create', 'store']);
    Route::resource('panel/foods',FoodController::class);
    Route::resource('panel/addresses',AddressController::class);
    Route::patch('panel/addresses',[AddressController::class, 'setAddress'])->name('addresses.set');
});
