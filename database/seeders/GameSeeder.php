<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $titles = [
            'Luminous Drift',
            'Pixel Odyssey',
            'Echoes of Ember',
            'Neon Hollow',
            'Starbound Tides',
            'Forgotten Grove',
            'Shadow Lattice',
            'Celestial Forge',
            'Mystic Cartographer',
            'Void Runner',
            'Crimson Pulse',
            'The Last Lantern',
            'Aether Veil',
            'Last Quest',
            'Ironleaf Tales',
            'Sapphire Skies',
            'Temporal Rift',
            'Quantum Meadow',
            'Silent Monolith',
            'Twilight Monsoon',
            'Paperbound Realms',
            'Obsidian Wisp',
            'Lantern of Lost Souls',
            'Frostbitten Horizon',
            'Velvet Eclipse',
            'Circuit Serenade',
            'Wandering Glyph',
            'Starlit Reverie',
            'Glasswing',
            'Echo Harbor',
            'Ashen Vale',
            'The Lullaby of Neptune',
            'Cinderbound',
            'Specter Symphony',
            'Whispering Lantern',
            'Shadowvine',
            'Chrono Nomad',
            'Loom of Fate',
            'Moonlit Drift',
            'Petalstorm',
            'Ironclad Dreams',
            'Hollow Compass',
            'Silent Aurora',
            'Nether Bloom',
            'Cradle of Stars',
            'Paper Horizon',
            'Oblivion Arcade',
            'Violet Ember',
            'Celestea',
            'The Wandering Key',
        ];

        $descriptions = [
            'A relaxing puzzle-platformer about light and reflections.',
            'A pixel-art adventure through a surreal world.',
            'Explore a volcanic realm and uncover its secrets.',
            'A neon-style cyberpunk stealth-action game.',
            'Sail across strange star systems and discover hidden islands.',
            'Explore a forgotten forest filled with mythical creatures.',
            'Solve mystical puzzles in a shadowy city.',
            'Build and manage a factory in a magical sky world.',
            'Draw your path through unknown maps and collect artifacts.',
            'A fast-paced action-platformer through an empty, dangerous dimension.',
            'A rhythm-based action game in a dark futuristic universe.',
            'Explore a village full of forgotten legends and lanterns.',
            'Journey through veiled dimensions of aether.',
            'Bring dreams to life in a surreal world.',
            'Experience a tale of magical leaves and iron secrets.',
            'Fly through celestial clouds and discover hidden islands.',
            'Solve time puzzles and restore a broken reality.',
            'A serene sandbox game in a field of quantum plants.',
            'Investigate a massive, silent monolith in a desert world.',
            'Navigate through an endless sunset storm.',
            'Explore books and stories that come to life.',
            'Master dark magic and fickle spirits.',
            'Find lost souls and guide them to the light.',
            'A strategic adventure across a frozen landscape.',
            'A story of intrigue and mystery during a cosmic eclipse.',
            'A musical puzzle game with electronic circuits.',
            'Decipher ancient symbols and reveal their stories.',
            'A dreamlike platformer under a starry sky.',
            'Fly as a magical butterfly through glassy landscapes.',
            'Explore a harbor town full of echoes from the past.',
            'A dark fantasy world filled with ash and ruins.',
            'A serene, ocean-based puzzle experience.',
            'Survive in a volcanic world full of enemies.',
            'An adventurous rhythmic symphony with spirits.',
            'A mysterious village where lanterns whisper.',
            'Discover the secrets of an enchanted vine forest.',
            'A time-traveling adventure sandbox across multiple dimensions.',
            'A game about weaving fate through choices.',
            'Glide through moonlit landscapes of an island.',
            'Command storms of blossoms in a magical world.',
            'A strategy game full of iron machinery and dreams.',
            'Find your way through a maze of ancient compasses.',
            'Watch the northern lights while uncovering hidden secrets.',
            'A botanical adventure in an underground flower garden.',
            'Explore star systems and cradle new worlds.',
            'A paper-art style RPG across distant horizons.',
            'An arcade game in a world that fades quickly.',
            'A magical adventure with purple flames and mysticism.',
            'Master magic and tea in a serene fantasy world.',
            'Find keys and mysteries in a wandering city.',
        ];

        $developers = [
            'Lumen Studios',
            'PixelForge',
            'EmberWorks',
            'NeonByte',
            'Oblivion Arcade',
            'Grove Interactive',
            'ShadowGrid',
            'Celestial Labs',
            'Ironclad Dreams',
            'Void Interactive',
            'Crimson Code',
            'LanternSoft',
            'Aether Games',
            'DreamWeave Studios',
            'Ironleaf Interactive',
            'EmberWorks',
            'Temporal Studios',
            'Quantum Meadow',
            'Silent Monolith Co.',
            'Twilight Works',
            'Paperbound Games',
            'Obsidian Wisp',
            'LanternSoft',
            'Frostbyte Games',
            'Velvet Eclipse Studios',
            'Circuit Symphony',
            'Glyph Interactive',
            'EmberWorks',
            'Glasswing Games',
            'Echo Harbor Co.',
            'Ashen Vale Studios',
            'Aether Games',
            'Cinderbound',
            'Specter Symphony',
            'LanternSoft',
            'Shadowvine Studios',
            'Chrono Nomad Games',
            'Oblivion Arcade',
            'EmberWorks',
            'Petalstorm Games',
            'Ironclad Dreams',
            'Hollow Compass Co.',
            'Silent Aurora Studios',
            'Nether Bloom Games',
            'Cradle Games',
            'Paper Horizon',
            'Oblivion Arcade',
            'Violet Ember Studios',
            'Ironclad Dreams',
            'Wandering Key Studios',
        ];

        $placeholderImages = [
            database_path('seeders/placeholders/placeholder1.png'),
            database_path('seeders/placeholders/placeholder2.png'),
            database_path('seeders/placeholders/placeholder3.png'),
        ];

        for ($i = 0; $i < 50; $i++) {
            $title = $titles[$i];
            $description = $descriptions[$i];
            $developer = $developers[$i];

            $releaseDate = now()->subDays(rand(0, 5000))->format('Y-m-d');

            $placeholder = $placeholderImages[array_rand($placeholderImages)];

            $coverPath = Storage::disk('public')->putFile('games', new File($placeholder));

            $userId = rand(1, 25);

            Game::create([
                'title' => $title,
                'description' => $description,
                'developer' => $developer,
                'release_date' => $releaseDate,
                'cover_image' => $coverPath,
                'user_id' => $userId,
                'is_active' => true,
            ]);
        }
    }
}
