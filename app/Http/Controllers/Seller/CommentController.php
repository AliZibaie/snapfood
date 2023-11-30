<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\Comment\StoreCommentRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Comment as Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Service::index();
        return view('panels.seller.comments.index', compact('comments'));
    }

    public function indexAccepteds()
    {
        $comments = Service::indexAccepteds();
        return view('panels.seller.comments.accepteds.index', compact('comments'));
    }

    public function update(Comment $comment)
    {
        try {
            $comment->update(['is_accepted'=>1]);
            return redirect("panel/comments")->with('success', 'comment accepted successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/comments", 500)->with('fail', 'failed to accept comment!');
        }
    }

    public function destroy(Comment $comment)
    {
        try {
            $comment->update(['seller_wants_delete'=>1]);
            return redirect("panel/comments")->with('success', 'delete request has sent successfully!');
        }catch (\Throwable $exception){
            return redirect("panel/comments", 500)->with('fail', 'failed to send request!');
        }
    }

    public function show(Comment $comment)
    {
        return view('panels.seller.comments.accepteds.show', compact('comment'));
    }

    public function answer(StoreCommentRequest $request, int $id)
    {
        try {
            Comment::query()->create(['comment_id'=>$id,'message'=> $request->validated('message')]);
            return redirect("panel/comments")->with('success', 'answer comment has sent successfully!');
        }catch (\Throwable $exception){
            dd($exception->getMessage());
            return redirect("panel/comments", 500)->with('fail', 'failed to send message!');
        }
    }
}
