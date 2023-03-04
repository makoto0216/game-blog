<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GamepostRequest;
use App\Models\Gamepost;
use App\Models\User;
use App\Models\Comment;
use Cloudinary;



class GamepostController extends Controller
{
    public function index(Gamepost $gamepost)
    {
        return view('gameposts/index')->with(['gameposts' => $gamepost->getPaginateByLimit()]);
    }
    
    public function show(Gamepost $gamepost)
    {
        return view('gameposts/show')->with(['gamepost' => $gamepost]);
    }
    
    public function usermypage(Gamepost $gamepost)
    {
        return view('gameposts/usermypage')->with(['gamepost' => $gamepost]);
    }
    
    public function create()
    {
        return view('gameposts/create');  
    }
    
    public function store(Request $request, Gamepost $gamepost)
    {
        $input = $request['gamepost'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['user_id' => $request->user()->id];
        $input += ['image_url' => $image_url];  
        $gamepost->fill($input)->save();
        return redirect('/gameposts/' . $gamepost->id);
    }
}