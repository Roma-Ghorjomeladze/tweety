<?php

namespace App\Models;


use App\Models\Tweet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use \App\Models\Like;

trait Likable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            '=',
            'tweets.id'
        );
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function like($user = null, bool $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : current_user()->id(),
        ],
            [
                'liked' => $liked,
            ]
        );
    }

    public function disLike($user = null)
    {
        $this->like($user, false);
    }

    public function isLikedBy(User $user = null, bool $licked = true)
    {
        return (bool)current_user()->likes()->where(['tweet_id' => $this->id, 'liked' => $licked])->count();
    }

    public function isDislikedBy(User $user = null)
    {
        return $this->isLikedBy($user, false);
    }

    public function toggleLike(User $user, $liked = 1)
    {
        $record = Like::where(['tweet_id' => $this->id, 'user_id' => $user->id])->first();
        if (!$record) {
            $this->likes()->create(['user_id' => $user->id, 'tweet_id' => $this->id, 'liked' => !!$liked]);
        }
        if ($record && !is_null($record->liked) && $record->liked == $liked) {
            $this->likes()->where(['tweet_id' => $this->id, 'user_id' => $user->id])->update(['liked' => null]);
        } else {
            $this->likes()->where(['tweet_id' => $this->id, 'user_id' => $user->id])->update(['liked' => !!$liked]);
        }

    }

    public function toggleDislike(User $user)
    {
        $this->toggleLike($user, 0);
    }
}
