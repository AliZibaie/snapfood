<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\StoreBannerRequest;
use App\Models\Banner;
use App\Services\Image;
use App\traits\HasSetBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('panels.admin.banners.index', compact('banners'));
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
            Image::save($request, 'banners');
            return redirect('panel/banners')->with('success', 'banner created successfully!');
        }catch (\Throwable $exception){
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
    public function update(Request $request, Banner $banner)
    {
        try {
            Banner::query()->update(['status'=>0]);
            $banner->update(['status'=>1, 'alt'=>$banner->alt, 'title'=>$banner->title]);
            $banner->save();
            return redirect('panel/banners')->with('success', 'banner has been set successfully!');
        }catch (\Throwable $exception){
            dd($exception->getMessage());
            return redirect('panel/banners', 500)->with('fail', 'failed to set banner!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            Image::delete($banner);
            return redirect('panel/banners')->with('success', 'banner deleted successfully!');
        }catch (\Throwable $exception){
            return redirect('panel/banners', 500)->with('fail', 'failed to delete banner!');
        }
    }
}
