<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    
    public function following(User $user)
    {
        return $user->following()->with('details')->get();
    }
    
    public function followers(User $user)
    {
        return $user->followers()->with('details')->get();
    }
    
    public function toggleFollow(User $user)
    {
        $me = auth()->user();
        $me->following()->toggle($user->id);
        
        return redirect()->back();
    }
}
