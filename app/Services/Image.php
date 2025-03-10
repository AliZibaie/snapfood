<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image
{
    public static function save($request, $folderName, $newRecord) : void
    {
        $fullName = pathinfo($request->file('image')->getClientOriginalName())['filename'];
        $extension = $request->file('image')->getClientOriginalExtension();
        $newName = time().rand(100000, 1000000000).$fullName.rand(100000, 1000000000).'.'.$extension;
        $url = $request->file('image')->storeAs("public/images/$folderName", $newName);
        $newRecord->image()->create(['url' => "storage/images/$folderName/".$newName]);
    }

    public static function delete(Model $model, $folderName) : void
    {
        $url = explode('/', $model->image->url);
        $url = end($url);
        Storage::delete("public/images/$folderName/$url");
        Storage::delete($model->image->url);
        $model->image()->delete();
    }
}
