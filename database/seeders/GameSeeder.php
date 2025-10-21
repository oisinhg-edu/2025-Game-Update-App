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
                'platform' => 'Nintendo',
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
                'description' => 'Hinako’s hometown is engulfed in fog, driving her to fight grotesque monsters and solve eerie puzzles. Uncover the disturbing beauty hidden in terror.',
                'release_date' => '2025-09-25',
                'platform' => 'PS',
                'cover_img' => 'silenthillf.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Elden Ring',
                'description' => 'Elden Ring is an action RPG developed by FromSoftware and published by Bandai Namco Entertainment, released in February 2022. Directed by Hidetaka Miyazaki, with world-building contributions from novelist George R. R. Martin, the game features an expansive open world called the Lands Between. Players assume the role of a customisable character known as the Tarnished, who must explore this world, battle formidable enemies, and seek to restore the Elden Ring to become the Elden Lord.',
                'release_date' => '2022-02-25',
                'platform' => 'PS',
                'cover_img' => 'eldenring.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Chrono Trigger',
                'description' => 'In this turn-based Japanese RPG, young Crono must travel through time through a misfunctioning teleporter to rescue his misfortunate companion and take part in an intricate web of past and present perils. The adventure that ensues soon unveils an evil force set to destroy the world, triggering Crono’s race against time to change the course of history and bring about a brighter future.',
                'release_date' => '1995-03-11',
                'platform' => 'Nintendo',
                'cover_img' => 'chronotrigger.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'description' => 'Red Dead Redemption 2 is the epic tale of outlaw Arthur Morgan and the infamous Van der Linde gang, on the run across America at the dawn of the modern age.',
                'release_date' => '2018-10-26',
                'platform' => 'PS',
                'cover_img' => 'rdr2.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Half-Life Alyx',
                'description' => 'Half-Life: Alyx is Valve’s VR return to the Half-Life series. It’s the story of an impossible fight against a vicious alien race known as the Combine, set between the events of Half-Life and Half-Life 2. Alyx Vance and her father Eli mount an early resistance to the Combine’s brutal occupation of Earth.',
                'release_date' => '2020-03-23',
                'platform' => 'PC',
                'cover_img' => 'hlalyx.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'The Witcher 3: Wild Hunt',
                'description' => 'Set in a dark fantasy world, the game follows Geralt of Rivia, a monster hunter searching for his adopted daughter, Ciri, while navigating political conflicts and supernatural threats. Gameplay features exploration, combat, character progression, and branching narratives shaped by player choices. Widely acclaimed for its writing, world-building, and depth, it is considered one of the most influential RPGs of its generation.',
                'release_date' => '2015-05-19',
                'platform' => 'Xbox',
                'cover_img' => 'witcher3.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Outer Wilds',
                'description' => 'Outer Wilds is a critically-acclaimed and award-winning open world mystery about a solar system trapped in an endless time loop. The newest member of the space program in a small village on the planet Timber Hearth, the player navigates a space shuttle and travels across their solar system to get to the bottom of its mysteries by exploring the cosmos and gathering the knowledge hidden within each of the system’s planets, left behind by another civilization in the distant past.',
                'release_date' => '2019-05-28',
                'platform' => 'Xbox',
                'cover_img' => 'outerwilds.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Bloodborne',
                'description' => 'An action RPG in which the player embodies a Hunter who, after being transfused with the mysterious blood local to the city of Yharnam, sets off into a "night of the Hunt", an extended night in which Hunters may phase in and out of dream and reality in order to thin the outbreak of abominable beasts that plague the land and, for the more resilient and insightful Hunters, uncover the answers to the Hunt’s many mysteries.',
                'release_date' => '2015-03-24',
                'platform' => 'PS',
                'cover_img' => 'bloodborne.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'The Legend of Zelda: Ocarina of Time',
                'description' => 'The Legend of Zelda: Ocarina of Time is the fifth main installment of The Legend of Zelda series and the first to be released for the Nintendo 64. It was one of the most highly anticipated games of its age, and is listed among the greatest video games ever created by numerous websites and magazines. The gameplay of Ocarina of Time was revolutionary for its time, it has arguably made more of an impact on later games in the series than any of its predecessors even though they had the same cores of exploration, dungeons, puzzles and item usage. Among the gameplay mechanics, one of the most noteworthy is the time-traveling system. The game begins with the player controlling the child Link, but later on an adult Link becomes a playable character as well and each of them has certain unique abilities. Ocarina of Time also introduces the use of music to solve puzzles: as new songs are learned, they can be used to solve puzzles, gain access to new areas and warp to different locations. Dungeon exploration is somewhat more puzzle-oriented than in earlier games but they are not too complex.',
                'release_date' => '1998-11-21',
                'platform' => 'Nintendo',
                'cover_img' => 'oot.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Portal 2',
                'description' => 'Sequel to the acclaimed Portal (2007), Portal 2 pits the protagonist of the original game, Chell, and her new robot friend, Wheatley, against more puzzles conceived by GLaDOS, an A.I. with the sole purpose of testing the Portal Guns mechanics and taking revenge on Chell for the events of Portal. As a result of several interactions and revelations, Chell once again pushes to escape Aperture Science Labs.',
                'release_date' => '2011-04-18',
                'platform' => 'PC',
                'cover_img' => 'portal2.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ]
        ]);
    }
}
