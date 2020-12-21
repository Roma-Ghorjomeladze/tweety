<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Mockery\Exception;

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

    public function delete(Tweet $tweet){
        try {
            $tweet->delete();
        }catch (Exception $e){
            dd($e);
        }
        return redirect('tweets');
    }


    public function toggleLike(Tweet $tweet){
        $tweet->toggleLike(current_user());
        return back();
    }

    public function toggleDislike(Tweet $tweet){
        $tweet->toggleDislike(current_user());
        return back();
    }
}
