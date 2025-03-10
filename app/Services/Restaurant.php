<?php

namespace App\Services;
use \App\Models\Restaurant as Model;
use App\Models\RestaurantCategory;
use Illuminate\Support\Facades\Auth;

class Restaurant
{
    public static function update($request)
    {
        $UpdatedRecord = Auth::user()->restaurant->update(['name'=>$request->input('name'), 'phone'=>$request->input('phone'), 'account_number'=>$request->input('account_number'), 'shipping_cost'=>$request->input('shipping_cost')]);
        if ($request->input('type')){
            Auth::user()->restaurant->restaurantCategories()->detach();
            foreach ($request->input('type') as $type) {
                $id = RestaurantCategory::query()->where('type', $type)->first()->id;
                Auth::user()->restaurant->restaurantCategories()->attach($id);
            }
        }
        if ($request->validated('image')){
            if (isset(Auth::user()->restaurant->image->url)){
                Image::delete(Auth::user()->restaurant, 'restaurants');
            }
            Image::save($request, 'restaurants', Auth::user()->restaurant);
        }
    }

    public static function store($request)
    {
        Auth::user()->restaurant()->create($request->validated());
        Auth::user()->assignRole('seller');
    }

    public static function getUnselectedCategories()
    {
        $selected = Auth::user()->restaurant->restaurantCategories->pluck('type')->toArray();
        $unselected = RestaurantCategory::query()->whereNotIn('type', $selected)->get();
        return $unselected;
    }

    public static function delete($request)
    {
        // TODO
    }
}
