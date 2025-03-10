<?php

namespace App\Http\Resources\Restaurant;

use App\Services\API\Resources\Restaurant;
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
            'type'=>Restaurant::getCatgegories($this),
            'is_open'=>Restaurant::isOpen($this),
            'image'=>asset($this->image->url),
            'foods'=>Restaurant::getFoods($this),
            'schedules'=>Restaurant::getSchedules($this),
            'current_address'=>Restaurant::getDefaultAddress($this),
            'unavailable_addresses'=>[
                'address' => Restaurant::getUnavailableAddresses($this),
            ],
//            'score'=>$this->score,
        ];
    }
}
