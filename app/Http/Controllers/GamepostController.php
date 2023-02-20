<?php

namespace App\Http\Controllers;

use App\Models\Gamepost;
use Illuminate\Http\Request;

class GamepostController extends Controller
{
    public function index(Gamepost $post)
    {
        return view('Gameposts/index')->with(['Gameposts' => $post->getPaginateByLimit()]);
    }
}
