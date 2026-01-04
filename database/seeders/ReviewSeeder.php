<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::truncate();

        $negativeComments = [
            'Did not enjoy this game at all.',
            'Frustrating mechanics and poor design.',
            'Bugs ruined the experience.',
            'Not fun and disappointing.',
            'The game is too confusing and hard to follow.'
        ];

        $neutralComments = [
            'It was okay, nothing special.',
            'Average gameplay, could be better.',
            'Some fun moments, but mixed overall.',
            'Decent, but not memorable.',
            'An okay game for a short play.'
        ];

        $positiveComments = [
            'Absolutely loved it!',
            'Amazing experience from start to finish.',
            'Engaging gameplay and beautiful visuals.',
            'Highly recommend to anyone!',
            'One of the best indie games I have played.'
        ];

        $ratings = [0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5];
        $userIds = range(1, 25);

        Game::all()->each(function ($game) use ($ratings, $userIds, $negativeComments, $neutralComments, $positiveComments) {
            $numReviews = rand(1, 8);

            $reviewUsers = collect($userIds)->shuffle()->take($numReviews);

            foreach ($reviewUsers as $userId) {
                $rating = $ratings[array_rand($ratings)];

                if ($rating <= 2) {
                    $comment = $negativeComments[array_rand($negativeComments)];
                } elseif ($rating <= 3.5) {
                    $comment = $neutralComments[array_rand($neutralComments)];
                } else {
                    $comment = $positiveComments[array_rand($positiveComments)];
                }

                Review::create([
                    'game_id' => $game->id,
                    'user_id' => $userId,
                    'rating' => $rating,
                    'comment' => $comment,
                ]);
            }
        });
    }
}
