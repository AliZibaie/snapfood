<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Restaurant\StoreRestaurantRequest;
use App\Http\Requests\Seller\Restaurant\UpdateRestaurantRequest;
use App\Models\Restaurant;
use App\Services\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panels.seller.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        try {
            Auth::user()->restaurant()->create($request->validated());
            Auth::user()->assignRole('seller');
            return redirect("panel/restaurants/".Auth::user()->restaurant->id."/edit")->with('success', 'restaurant created successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/restaurants/".Auth::user()->restaurant->id."/edit", 500)->with('fail', 'failed to create restaurant!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::getRestaurantCategories();
        return view('panels.seller.restaurants.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant = Restaurant::query()->update($request->validated()->except('type'));
        $restaurant->category
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
