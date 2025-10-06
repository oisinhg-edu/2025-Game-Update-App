<?php

namespace Database\Seeders;

use App\Models\Game;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        DB::table('games')->truncate();

        Game::insert([
            [
                'title' => 'Hollow Knight: Silksong',
                'description' => 'Hollow Knight: Silksong is the epic sequel to Hollow Knight, the epic action-adventure of bugs and heroes. As the lethal hunter Hornet, journey to all-new lands, discover new powers, battle vast hordes of bugs and beasts and uncover ancient secrets tied to your nature and your past.',
                'release_date' => '2025-09-04',
                'platform' => 'PC',
                'cover_img' => 'silksong.png',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Megabonk',
                'description' => 'Smash your way through endless waves of enemies and grow absurdly powerful! Grab loot, level up, unlock characters and upgrade to create unique and crazy builds as you fend off hordes of creatures!',
                'release_date' => '2025-09-18',
                'platform' => 'PC',
                'cover_img' => 'megabonk.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Silent Hill f',
                'description' => 'Hinako\'s hometown is engulfed in fog, driving her to fight grotesque monsters and solve eerie puzzles. Uncover the disturbing beauty hidden in terror.',
                'release_date' => '2025-09-25',
                'platform' => 'PC',
                'cover_img' => 'silenthillf.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ]
        ]);
    }
}
