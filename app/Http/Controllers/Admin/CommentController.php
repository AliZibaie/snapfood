<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Comment as Service;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Service::index();
        return view('panels.admin.comments.index', compact('comments'));
    }

}
