<?php

use App\Http\Controllers\Admin\BannerController;
use Illuminate\Support\Facades\Route;









Route::middleware('role:admin')->group(function (){
    Route::resource('panel/banners',BannerController::class);
});
