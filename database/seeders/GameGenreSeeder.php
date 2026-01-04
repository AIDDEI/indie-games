<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameGenreSeeder extends Seeder
{
    public function run(): void
    {
        $genreIds = Genre::pluck('id')->toArray();

        Game::all()->each(function ($game) use ($genreIds) {
            $numGenres = rand(1, 5);
            $randomGenres = collect($genreIds)->shuffle()->take($numGenres)->toArray();

            $game->genres()->sync($randomGenres);
        });
    }
}
