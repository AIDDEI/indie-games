<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $games = Game::with('genres')
            ->whereHas('favorites', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->latest()
            ->paginate(12);

        return view('favorites.index', compact('games'));
    }

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
