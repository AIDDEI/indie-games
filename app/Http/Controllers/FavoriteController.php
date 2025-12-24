<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Game;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Game $game)
    {
        $user = auth()->user();

        $favorite = Favorite::where('user_id', $user->id)
            ->where('game_id', $game->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'game_id' => $game->id,
            ]);
        }

        return back();
    }
}
