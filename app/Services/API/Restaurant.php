<?php

namespace App\Services\API;

use App\Http\Resources\Address\AddressCollection;
use App\Http\Resources\Restaurant\RestaurantCollection;
use Illuminate\Support\Facades\Auth;
use App\Models\restaurant as Model;

class Restaurant
{
    public static function index($request)
    {
        return new RestaurantCollection(Model::all());
    }
}
