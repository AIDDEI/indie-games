<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $games = Game::with('genres')
            ->where('is_active', true)
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->search . '%')
                        ->orWhere('developer', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->filled('genres'), function ($query) use ($request) {
                $query->whereHas('genres', function ($q) use ($request) {
                    $q->whereIn('genres.id', $request->genres);
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $genres = Genre::orderBy('name')->get();

        return view('games.index', compact('games', 'genres'));
    }

    public function create()
    {
        $this->authorize('create', Game::class);

        $genres = Genre::orderBy('name')->get();
        return view('games.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Game::class);

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
        $this->authorize('view', $game);

        $game->load(['user', 'genres', 'reviews.user']);

        $hasReviewed = auth()->check()
            ? $game->reviews->where('user_id', auth()->id())->isNotEmpty()
            : false;

        return view('games.show', compact('game', 'hasReviewed'));
    }

    public function edit(Game $game)
    {
        $this->authorize('update', $game);

        $genres = Genre::orderBy('name')->get();
        $gameGenres = $game->genres->pluck('id')->toArray();

        return view('games.edit', compact('game', 'genres', 'gameGenres'));
    }

    public function update(Request $request, Game $game)
    {
        $this->authorize('update', $game);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'developer' => 'required|string|max:255',
            'release_date' => 'required|date',
            'cover_image' => 'nullable|image',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($game->cover_image) {
                Storage::disk('public')->delete($game->cover_image);
            }

            $validated['cover_image'] = $request->file('cover_image')->store('games', 'public');
        } else {
            unset($validated['cover_image']);
        }

        $game->update($validated);

        if (isset($validated['genres'])) {
            $game->genres()->sync($validated['genres']);
        }

        return redirect()->route('games.show', $game);
    }

    public function destroy(Game $game)
    {
        $this->authorize('delete', $game);

        if ($game->cover_image) {
            Storage::disk('public')->delete($game->cover_image);
        }

        $game->delete();

        return redirect()->route('games.index');
    }

    public function myGames()
    {
        $games = Game::where('user_id', auth()->id())->get();
        return view('games.my-games', compact('games'));
    }

    public function toggleActive(Game $game)
    {
        $this->authorize('update', $game);

        $game->update([
            'is_active' => !$game->is_active,
        ]);

        return back()->with('success', 'Game status updated.');
    }
}
