<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\StoreBannerRequest;
use App\Models\Banner;
use App\Services\Image;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('panels.admin.banners.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panels.admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        try {
            $banner = Banner::query()->create(['title'=>$request->title, 'alt'=>$request->alt]);
            Image::save($banner, $request, 'banners');
            return redirect('panel/banners')->with('success', 'banner created successfully!');
        }catch (\Throwable $exception){
            dd($exception->getMessage());
            return redirect('panel/banners', 500)->with('fail', 'failed to create banner!');
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
    public function destroy(string $id)
    {
        //
    }
}
