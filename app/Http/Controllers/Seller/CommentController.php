<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        $comments = DB::table('comments')
            ->join('orders', 'comments.order_id', '=', 'orders.id')
            ->join('food', 'orders.food_id', '=', 'food.id')
            ->where('food.restaurant_id', '=', Auth::user()->restaurant->id)
            ->select('comments.*')
            ->where('comments.is_accepted', 0)
            ->where('comments.seller_wants_delete', 0)
            ->get()
            ->sortDesc();

        return view('panels.seller.comments.index', compact('comments'));
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
}
