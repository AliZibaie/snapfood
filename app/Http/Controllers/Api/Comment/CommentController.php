<?php

namespace App\Http\Controllers\Api\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Comment\StoreCommentRequest;
use App\Models\Comment;
use App\traits\HasFail;
use App\Services\API\Comment as Service;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        try {
            return Service::store($request);
        }catch (\Throwable $exception){
            return Service::fail($exception);
        }
    }
}
