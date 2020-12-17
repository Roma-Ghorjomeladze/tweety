<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function store(){
        $attributes = request()->validate(['body' => 'required|max:255']);

        Tweet::create([
            'user_id' => current_user()->id,
            'body' => $attributes['body'],
        ]);

        return redirect('/tweets');
    }

    public function index(){
        return view('tweets.index', [
            'tweets' => current_user()->timeline(),
        ]);
    }
}
