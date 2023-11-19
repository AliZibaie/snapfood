<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Food\storeFoodRequest;
use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Services\Food as Service;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all();
        return view('panels.seller.foods.index', compact('foods'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $foodCategories = FoodCategory::all();
        return view('panels.seller.foods.create', compact('foodCategories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodRequest $request)
    {
        try {
            Service::store($request);
            return redirect("panel/foods")->with('success', 'food created successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/foods", 500)->with('fail', 'failed to create food!');
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
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        try {
            Service::delete($food);
            return redirect("panel/foods")->with('success', 'food deleted successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/foods", 500)->with('fail', 'failed to delete food!');
        }
    }
}
