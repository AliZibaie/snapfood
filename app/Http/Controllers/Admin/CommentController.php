<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Services\Admin\Comment as Service;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Service::index();
        return view('panels.admin.comments.index', compact('comments'));
    }

    public function destroy(int $id)
    {
        try {
            $comment = Comment::query()->find($id);
            $comment->delete();
            return redirect('panel/comments/requests')->with('success', 'comment deleted successfully!');
        }catch (\Throwable $exception){
            return redirect('panel/comments/requests', 500)->with('fail', 'failed to delete comment!');
        }
    }

}
