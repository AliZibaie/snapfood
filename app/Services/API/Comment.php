<?php

namespace App\Services\API;

use App\Models\Comment as Model;
use App\traits\HasFail;

class Comment
{
    use HasFail;

    public static function store($request)
    {
        $newRecord = [
            'order_id'=>$request->order_id,
            'message'=>$request->message,
            'score'=>$request->score,
        ];
        $comment = Model::query()->create($newRecord);
        return response()->json([
            'status'=>true,
            'comment'=>[
                'message'=>$comment->message,
            ],
            'message'=>'your comment has been sent successfully',
        ]);
    }
}
