<?php


use App\Http\Controllers\Seller\AddressController;
use App\Http\Controllers\Seller\ArchiveController;
use App\Http\Controllers\Seller\CommentController;
use App\Http\Controllers\Seller\FoodController;
use App\Http\Controllers\Seller\OrderController;
use App\Http\Controllers\seller\ReportController;
use App\Http\Controllers\Seller\RestaurantController;
use App\Http\Controllers\Seller\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'no_more_restaurant'])->group(function (){
    Route::get('panel/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('panel/restaurants/create', [RestaurantController::class, 'store'])->name('restaurants.store');
    Route::get('panel/schedules',[ScheduleController::class, 'create']);
    Route::post('panel/schedules',[ScheduleController::class, 'store']);
});

Route::middleware(['auth', 'no_more_schedule'])->group(function (){
    Route::get('panel/schedules/create',[ScheduleController::class, 'create'])->name('schedules.create');
    Route::post('panel/schedules/create',[ScheduleController::class, 'store'])->name('schedules.store');
});

Route::middleware(['auth', 'role:seller'])->group(function (){
    Route::resource('panel/restaurants',RestaurantController::class)->except(['create', 'store']);
    Route::resource('panel/foods',FoodController::class)->except('update');
    Route::put('panel/foods/{food}',[FoodController::class, 'update'])->name('foods.update');
    Route::patch('panel/foods/{food}',[FoodController::class, 'assignDiscount'])->name('foods.assign');
    Route::resource('panel/orders',OrderController::class);
    Route::resource('panel/archives',ArchiveController::class);
    Route::resource('panel/addresses',AddressController::class);
    Route::patch('panel/addresses/{address}',[AddressController::class, 'setAddress'])->name('addresses.set');
    Route::put('panel/addresses/{address}',[AddressController::class, 'update'])->name('addresses.update');
    Route::resource('panel/schedules',ScheduleController::class)->except(['create', 'store']);
    Route::get('panel/reports',[ReportController::class, 'index'])->name('reports.index');
    Route::resource('panel/comments',CommentController::class);
    Route::put('panel/comments',[CommentController::class, 'update']);
    Route::get('panel/accepted/comments',[CommentController::class, 'indexAccepteds'])->name('comments.accepteds');
    Route::get('panel/accepted/comments/{comment}',[CommentController::class, 'show'])->name('comments.accepteds.show');
    Route::post('panel/accepted/comments/{comment}',[CommentController::class, 'answer'])->name('comments.answer');
});
