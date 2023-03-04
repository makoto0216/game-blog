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
    
    public function commentcreate()
    {
        return view('gameposts/show');
    }
    
    public function commentstore(Comment $comment, CommentRequest $request)
    {
       $input = $request['comment'];
       $input += ['user_id' => $request->user()->id];
       $input += ['gamepost_id' => $request->gamepost_id];  
       $comment->fill($input)->save(); 
       return redirect('/gameposts/' . $comment->gamepost->id);
    }
}
