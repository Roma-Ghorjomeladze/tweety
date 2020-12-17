<?php


namespace App\Models;

trait Followable
{

    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function toggleFollow(User $user)
    {
        if(current_user()->following($user)){
            $this->unFollow($user);
        } else {
            $this->follow($user);
        }
    }

    public function unFollow(User $user): int
    {
        return $this->follows()->detach($user);
    }

    public function follow(User $user): User{
        return $this->follows()->save($user);
    }
}
