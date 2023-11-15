<?php

namespace App\Services;

class Image
{
    public static function save($banner, $request, $folderName) : void
    {
        $fullName = pathinfo($request->file('image')->getClientOriginalName())['filename'];
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = time().rand(100000, 1000000000).$fullName.rand(100000, 1000000000).'.'.$extension;
        $url = $request->file('image')->storeAs("public/images/$folderName", $newName);
        $banner->image()->create(['url' => "storage/images/$folderName/".$newName]);
    }
}
