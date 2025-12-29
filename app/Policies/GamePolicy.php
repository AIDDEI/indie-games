<?php

namespace App\Policies;

use App\Models\Game;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GamePolicy
{
    public function update(User $user, Game $game): bool
    {
        return $game->user_id === $user->id;
    }

    public function view(User $user, Game $game): bool
    {
        if ($game->is_active) {
            return true;
        }

        if ($user && ($user->id === $game->user_id || $user->role->name === 'admin')) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Game $game): bool
    {
        return $game->user_id === $user->id;
    }
}
