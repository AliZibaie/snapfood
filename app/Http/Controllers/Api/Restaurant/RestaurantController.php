<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Services\API\Restaurant as Service;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index(Request $request)
    {
        return Service::index($request);
    }

}
