<?php

namespace App\Http\Resources\Restaurant;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->name,
            'type'=>$this->restaurantCategories->pluck('type')->toArray(),
            'current_address'=>$this->addresses()->where('is_default', 1)->select('title', 'address', 'longitude', 'latitude')->get()->toArray(),
            'other_available_addresses'=>[
                'address' => $this->addresses()->where('is_default', 0)->select('title', 'address', 'longitude', 'latitude')->get()->toArray(),
//                'latitude' => $this->addresses->pluck('latitude')->toArray(),
//                'longitude' => $this->addresses->pluck('longitude')->toArray(),
            ],
            'is_open'=>$this->status,
//            'image'=>$this->image_>url,
//            'score'=>$this->score,
        ];
    }
}
