<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\FoodCategoryController;
use App\Http\Controllers\Admin\RestaurantCategoryController;
use Illuminate\Support\Facades\Route;









Route::middleware('role:admin')->group(function (){
    Route::resource('panel/banners',BannerController::class);
    Route::resource('panel/categories/restaurant',RestaurantCategoryController::class);
    Route::resource('panel/categories/food',FoodCategoryController::class);
});
