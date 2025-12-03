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

        // Create 50 developers
        $developers = Developer::factory(250)->create();

        //
        // Ensure every game has at least 1 developer
        //
        foreach ($games as $game) {
            // Pick a random developer to assign as the required dev
            $developer = $developers->random();
            $developer->games()->attach($game->id);
        }

        //
        // Give developers 1–5 total games (including the one above)
        //
        foreach ($developers as $developer) {

            // The developer should have 1–5 games
            $desiredCount = rand(1, 5);

            // Pick additional random games
            $randomGames = $games->random($desiredCount);

            // Attach without removing previous assignments (no sync!)
            $developer->games()->syncWithoutDetaching($randomGames);
        }
    }
}
