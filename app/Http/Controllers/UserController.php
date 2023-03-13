<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gamepost;
use App\Models\User;
use App\Models\Comment;
use App\Models\Profile;


class UserController extends Controller
{
    public function mypage(User $user)
    {
        return view('gameposts/mypage')->with(['user' => $user]);
    }
    
    public function usermypage(User $user)
    {
        return view('users/usermypage')->with(['user' => $user]);
    }
    
}
