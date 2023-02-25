<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gamepost;
use App\Models\User;
use App\Models\Comment;
use App\Models\Profile;


class UserController extends Controller
{
    public function index(User $user)
    {
    return view('gameposts/index')->with(['posts' => $user]);
    }
}
