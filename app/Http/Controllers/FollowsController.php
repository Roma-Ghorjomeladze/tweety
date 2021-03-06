<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \Illuminate\Http\RedirectResponse;

class FollowsController extends Controller
{
    public function store(User $user): RedirectResponse
    {
        current_user()->toggleFollow($user);
       return back();
    }
}
