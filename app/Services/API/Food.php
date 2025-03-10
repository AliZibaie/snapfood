<?php

namespace App\Services\API;

use App\Http\Resources\Food\FoodResource;

class Food
{
    public static function index(FoodResource $resource)
    {
        $foodCategories = [];
        foreach ($resource->foodCategories as $foodCategory) {
            $foodCategories[] = [
              'id'=>$foodCategory->id,
              'title'=>$foodCategory->type,
                'foods'=>[
                    "id"=>$resource->id,
                    "title"=>$resource->name,
                    "price"=>$resource->price,
                    "raw_material"=>$resource->raw_material,
                    "image"=>asset($resource->image->url ?? ''),
                ],
            ];
        }
        return $foodCategories;
    }
}
