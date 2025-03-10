<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Controller;
//use App\Services\API\Food as Service;
use App\Http\Resources\Food\FoodCollection;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Restaurant $restaurant)
    {
        return new FoodCollection($restaurant->foods);
    }
}
