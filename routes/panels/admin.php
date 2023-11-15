<?php

use App\Http\Controllers\Admin\BannerController;
use Illuminate\Support\Facades\Route;









Route::middleware('role:admin')->group(function (){
    Route::resource('panels/admin/banners',BannerController::class);
});
