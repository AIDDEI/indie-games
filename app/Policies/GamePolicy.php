<?php

namespace App\Policies;

use App\Models\Game;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GamePolicy
{
    public function create(User $user)
    {
        if ($user->role->name === 'admin') {
            return true;
        }

        return $user->reviews()->count() >= 5;
    }

    public function update(User $user, Game $game)
    {
        return $game->user_id === $user->id;
    }

    public function view(User $user, Game $game)
    {
        if ($game->is_active) {
            return true;
        }

        if ($user && ($game->user_id === $user->id || $user->role->name === 'admin')) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Game $game)
    {
        return $game->user_id === $user->id;
    }
}
