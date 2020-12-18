<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user){
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->ownTwits($user)
        ]);
    }

    public function edit(User $user){
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        $attributes = request()->validate([
            'name' => 'required|max:255|string',
            'username' => "required|unique:users,username,{$user->id}|max:255|alpha_dash",
            'password' => 'string|min:3|max:255|confirmed',
            'email'=>"string|email|required|max:255|unique:users,email,{$user->id}"
        ]);
        $attributes['password'] = Hash::make(request()->password);
        if(request('avatar')){
            $attributes['avatar'] = 'storage/'.request('avatar')->store('avatars');
        }
        $user->update($attributes);
        return redirect($user->path());
    }
}
