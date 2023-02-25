<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function show(Comment $comment)
    {
        return view('gameposts/show')->with(['comments' => $comment]);
    }
}
