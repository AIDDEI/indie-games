<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReviewPolicy
{
    public function update(User $user, Review $review)
    {
        return $review->user_id === $user->id;
    }

    public function delete(User $user, Review $review)
    {
        return $review->user_id === $user->id || $user->role->name === 'admin' || $review->game->user_id === $user->id;
    }
}
