<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = Game::all();
        
        // create devs with a factory and for each one assign games
        Developer::factory(50)->create()->each(function ($developer) use ($games) {

            // Each developer gets between 1 and 5 games
            $randomGames = $games->random(rand(1, 5));

            $developer->games()->attach($randomGames);
        });
    }
}
