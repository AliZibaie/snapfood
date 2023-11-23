<?php

namespace App\Http\Resources\Cart;

use App\Services\API\Food;
use App\Services\API\Resources\Cart as Service;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return Service::index($this);
    }
}
