<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class Address
{
    public static function index()
    {
        $addressesQuery = Auth::user()->restaurant->addresses()
            ->when(request()->has('title'), function ($query){
                $title = request()->input('title');
                return $query->where('addresses.title', 'like', "%$title%");
            })
            ->when(request()->has('address'), function ($query){
                $address = request()->input('address');
                return $query->where('addresses.address', 'like', "%$address%");
            })
            ->when(request()->has('latitude'), function ($query){
                $latitude = request()->input('latitude');
                return $query->where('addresses.latitude', '=', $latitude);
            })
            ->when(request()->has('longitude'), function ($query){
                $longitude = request()->input('longitude');
                return $query->where('addresses.longitude', '=', $longitude);
            });

        return $addressesQuery->paginate(2);
    }
}
