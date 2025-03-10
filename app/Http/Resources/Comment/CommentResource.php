<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'comments'=>[
                'author'=>[
                    'name'=>$this->order->user->name
                ],
                'foods'=>$this->order->food->name,
                'score'=>$this->score,
                'content'=>$this->message,
                'answer'=>$this->comment()->message ?? null,
            ]
        ];
    }
}
