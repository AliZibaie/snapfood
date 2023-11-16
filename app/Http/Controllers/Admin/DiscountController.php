<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Food\StoreFoodCategoryRequest;
use App\Http\Requests\Admin\Discount\StoreDiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('panels.admin.discounts.index', compact('discounts'));
    }
    public function create()
    {
        return view('panels.admin.discounts.create');
    }
    public function store(StoreDiscountRequest $request)
    {
        try {
            Discount::query()->create($request->validated());
            return redirect('panel/discounts')->with('success', 'discount created successfully!');
        }catch (\Throwable $exception){
//            dd($exception->getMessage());
            return redirect('panel/discounts', 500)->with('fail', 'failed to create discount!');
        }
    }
    public function destroy(int $id)
    {
        try {
            Discount::destroy($id);
            return redirect('panel/discounts')->with('success', 'discount created successfully!');
        }catch (\Throwable $exception){
//            dd($exception->getMessage());
            return redirect('panel/discounts', 500)->with('fail', 'failed to create discount!');
        }
    }
}
