<?php

namespace App\Http\Controllers;

use App\Models\Gamepost;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\GamepostRequest;
use Illuminate\Http\Request;

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
    
    public function mypage(Gamepost $gamepost)
    {
        return view('gameposts/mypage')->with(['gamepost' => $gamepost]);
    }
}
