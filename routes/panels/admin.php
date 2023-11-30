<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\FoodCategoryController;
use App\Http\Controllers\Admin\RestaurantCategoryController;
use Illuminate\Support\Facades\Route;









Route::middleware(['auth', 'role:admin'])->group(function (){
    Route::resource('panel/banners',BannerController::class);
    Route::resource('panel/categories/restaurant',RestaurantCategoryController::class);
    Route::resource('panel/categories/food',FoodCategoryController::class);
    Route::resource('panel/discounts',DiscountController::class);
    Route::resource('panel/comments/requests',CommentController::class);
    Route::put('panel/comments/requests/{comment}',[CommentController::class, 'update'])->name('requests.update');
});
