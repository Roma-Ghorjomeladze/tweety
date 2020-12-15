<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user){
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->timeline()
        ]);
    }

    public function follow(User $user){
        return auth()->user()->follow($user);
    }
}
