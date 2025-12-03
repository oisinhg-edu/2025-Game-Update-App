<?php

namespace Database\Seeders;

use App\Models\Developer;
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
        $currentTimestampPlus = Carbon::now()->addHour();
        $currentTimestamp = Carbon::now();

        // load json game data
        $gamesJson = file_get_contents(database_path('data/games.json'));
        $realGames = json_decode($gamesJson, true);

        // add timestamps to each game
        // passing $game as reference using '&' which modifies the actual element in $realGames
        foreach ($realGames as &$game) {
            $game['created_at'] = $currentTimestampPlus;
            $game['updated_at'] = $currentTimestampPlus;
        }
        unset($game);

        $factoryGames = Game::factory()
            ->count(500)
            ->make()
            ->toArray();
        
        // Add timestamps to factory games
        foreach ($factoryGames as &$game) {
            $game['created_at'] = $currentTimestamp;
            $game['updated_at'] = $currentTimestamp;
        }
        unset($game);

        Game::insert(array_merge($realGames, $factoryGames));

        // use patch factory to generate between 1 and 10 patch notes for each game

        // preload user ids for patches
        $userIds = User::pluck('id')->all();

        // generate patches for each game in chunks
        Game::select('id')->chunk(100, function ($games) use ($userIds) {
            foreach ($games as $game) {
                Patch::factory(rand(1, 10))->create([
                    'game_id' => $game->id,
                    'user_id' => rand(0, 1) ? fake()->randomElement($userIds) : null,
                ]);
            }
        });
    }
}
