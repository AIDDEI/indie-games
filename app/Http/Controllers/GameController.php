<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with('genres')
            ->latest()
            ->paginate(12);

        return view('games.index', compact('games'));
    }

    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        return view('games.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'developer' => 'required|string|max:255',
            'release_date' => 'required|date',
            'cover_image' => 'required|image',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['cover_image'] = $request->file('cover_image')->store('games', 'public');

        $game = Game::create($validated);

        if (isset($validated['genres'])) {
            $game->genres()->sync($validated['genres']);
        }

        return redirect()->route('games.show', $game);
    }

    public function show(Game $game)
    {
        $game->load(['user', 'genres', 'reviews']);

        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        abort_unless($game->user_id === auth()->id(), 403);

        $genres = Genre::orderBy('name')->get();
        $gameGenres = $game->genres->pluck('id')->toArray();

        return view('games.edit', compact('game', 'genres', 'gameGenres'));
    }

    public function update(Request $request, Game $game)
    {
        abort_unless($game->user_id === auth()->id(), 403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'developer' => 'required|string|max:255',
            'release_date' => 'required|date',
            'cover_image' => 'required|image',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('games', 'public');
        }

        $game->update($validated);

        if (isset($validated['genres'])) {
            $game->genres()->sync($validated['genres']);
        }

        return redirect()->route('games.show', $game);
    }

    public function destroy(Game $game)
    {
        abort_unless($game->user_id === auth()->id(), 403);

        $game->delete();

        return redirect()->route('games.index');
    }
}
