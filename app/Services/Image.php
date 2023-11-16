<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class Image
{
    public static function save($request, $folderName) : void
    {
        $banner = Banner::query()->create(['title'=>$request->title, 'alt'=>$request->alt]);
        $fullName = pathinfo($request->file('image')->getClientOriginalName())['filename'];
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = time().rand(100000, 1000000000).$fullName.rand(100000, 1000000000).'.'.$extension;
        $url = $request->file('image')->storeAs("public/images/$folderName", $newName);
        $banner->image()->create(['url' => "storage/images/$folderName/".$newName]);
    }

    public static function delete($banner) : void
    {
        $url = explode('/', $banner->image->url);
        $url = end($url);
        Storage::delete("public/images/banners/$url");
        Storage::delete($banner->image->url);
        $banner->image()->delete();
        $banner->delete();
    }
}
