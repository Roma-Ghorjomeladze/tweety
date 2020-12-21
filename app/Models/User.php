<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Like;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'avatar',
        'desc',
        'cover',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets(){
        return $this->hasMany(Tweet::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function ownTwits(User $user){
        return Tweet::where('user_id', $user->id)->withLikes()->latest()->get();
    }

    public function timeline(){
        $friends = $this->follows()->pluck('id');
        return Tweet::whereIn('user_id', $friends)->orWhere('user_id', current_user()->id)->latest()->withLikes()->get();
    }

    public function getAvatarAttribute($value): string
    {
        $path = asset($value);
        if($path == "http://127.0.0.1:8000/" || $path=="http://localhost:8000/"){
            $path = asset('/storage/avatars/default.png');
        }
       return $path;
    }

    public function getCoverAttribute($value):string{
        $path = asset($value);
        if($path == "http://127.0.0.1:8000/" || $path=="http://localhost:8000/"){
            $path = asset('/storage/avatars/default_cover.png');
        }
        return $path;
    }

    public function suggestions(User $user){
        $friends = $this->follows()->pluck('id');
        return User::whereNotIn('id', $friends)->where('id', '<>', current_user()->id)->get();
    }

    public function path($append = ''): string
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/$append" : $path;
    }
}
