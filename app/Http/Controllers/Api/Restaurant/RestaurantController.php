<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Resources\Address\AddressResource;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Models\Restaurant;
use App\Services\API\Restaurant as Service;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index()
    {
        return Service::index();
    }

    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }

}
