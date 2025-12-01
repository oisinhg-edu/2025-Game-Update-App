<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Patch;
use App\Models\User;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now()->addHour();

        // load json game data
        $gamesJson = file_get_contents(database_path('data/games.json'));
        $realGames = json_decode($gamesJson, true);

        // add timestamps to each game
        $realGames = array_map(function ($game) use ($currentTimestamp) {
            return array_merge($game, [
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ]);
        }, $realGames);

        // add 'real' games from json
        Game::insert($realGames);

        // add factory games
        Game::factory(500)->create();

        // get all games that i just seeded
        // use patch factory to generate between 1 and 10 patch notes for each game
        $games = Game::all();

        foreach($games as $game) {
            Patch::factory(rand(1,10))->create([
                'game_id' => $game->id,
                'user_id' => rand(0, 1) ? User::inRandomOrder()->first()->id : null,
            ]);
        }
    }
}
