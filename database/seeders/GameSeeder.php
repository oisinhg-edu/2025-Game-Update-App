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
                'title' => 'Bloodborne',
                'description' => 'An action RPG in which the player embodies a Hunter exploring the cursed city of Yharnam, battling horrific beasts and uncovering the dark secrets behind the blood-borne plague.',
                'release_date' => '2015-03-24',
                'platform' => 'PS',
                'cover_img' => 'bloodborne.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'The Legend of Zelda: Ocarina of Time',
                'description' => 'The fifth main Zelda game, introducing 3D exploration, time travel, and music-based puzzles that defined a generation of adventure games.',
                'release_date' => '1998-11-21',
                'platform' => 'Nintendo',
                'cover_img' => 'ocarina.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Elden Ring',
                'description' => 'A vast open-world action RPG from the creators of Dark Souls, featuring exploration, challenging combat, and deep lore crafted with George R.R. Martin.',
                'release_date' => '2022-02-25',
                'platform' => 'PS',
                'cover_img' => 'eldenring.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'The Witcher 3: Wild Hunt',
                'description' => 'Play as Geralt of Rivia, a monster hunter searching for his missing daughter in a massive open world filled with moral choices and epic quests.',
                'release_date' => '2015-05-19',
                'platform' => 'PC',
                'cover_img' => 'witcher3.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Halo Infinite',
                'description' => 'The Master Chief returns in a new open-world campaign to face the Banished on the ringworld Zeta Halo, blending classic Halo gameplay with modern freedom.',
                'release_date' => '2021-12-08',
                'platform' => 'Xbox',
                'cover_img' => 'halo-infinite.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Super Mario Odyssey',
                'description' => 'Join Mario and his sentient hat, Cappy, on a globe-trotting 3D adventure to rescue Princess Peach and stop Bowser’s royal wedding plans.',
                'release_date' => '2017-10-27',
                'platform' => 'Nintendo',
                'cover_img' => 'odyssey.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Cyberpunk 2077',
                'description' => 'An open-world RPG set in the neon city of Night City, where players become V, a mercenary navigating power, implants, and survival.',
                'release_date' => '2020-12-10',
                'platform' => 'PC',
                'cover_img' => 'cyberpunk2077.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'God of War: Ragnarök',
                'description' => 'Kratos and Atreus face the end of days in this Norse epic, blending emotional storytelling with visceral combat and stunning visuals.',
                'release_date' => '2022-11-09',
                'platform' => 'PS',
                'cover_img' => 'gowragnarok.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'description' => 'An epic Western tale following Arthur Morgan and the Van der Linde gang as they struggle to survive in a changing America.',
                'release_date' => '2018-10-26',
                'platform' => 'Xbox',
                'cover_img' => 'rdr2.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Metroid Dread',
                'description' => 'Samus Aran faces deadly E.M.M.I. robots and uncovers secrets on planet ZDR in the first new 2D Metroid in nearly two decades.',
                'release_date' => '2021-10-08',
                'platform' => 'Nintendo',
                'cover_img' => 'metroiddread.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Starfield',
                'description' => 'Bethesda’s spacefaring RPG lets players explore over a thousand planets, build ships, and uncover humanity’s greatest mystery.',
                'release_date' => '2023-09-06',
                'platform' => 'PC',
                'cover_img' => 'starfield.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Spider-Man 2',
                'description' => 'Peter Parker and Miles Morales swing across New York City, facing off against Kraven and Venom in this next-gen superhero blockbuster.',
                'release_date' => '2023-10-20',
                'platform' => 'PS',
                'cover_img' => 'spiderman2.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Forza Horizon 5',
                'description' => 'Race across a vast recreation of Mexico in the most expansive and dynamic entry in the Forza Horizon series.',
                'release_date' => '2021-11-09',
                'platform' => 'Xbox',
                'cover_img' => 'forza5.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Animal Crossing: New Horizons',
                'description' => 'Create your own island paradise, decorate your home, and befriend adorable animal villagers in this relaxing life sim.',
                'release_date' => '2020-03-20',
                'platform' => 'Nintendo',
                'cover_img' => 'acnh.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Baldur’s Gate 3',
                'description' => 'A sprawling RPG set in the Dungeons & Dragons universe, where player choice and character relationships shape an epic narrative.',
                'release_date' => '2023-08-03',
                'platform' => 'PC',
                'cover_img' => 'bg3.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Ghost of Tsushima',
                'description' => 'A samurai tale set during the Mongol invasion of Japan. Play as Jin Sakai and forge your legend as the Ghost.',
                'release_date' => '2020-07-17',
                'platform' => 'PS',
                'cover_img' => 'tsushima.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Gears 5',
                'description' => 'Kait Diaz leads the fight against the Swarm in this intense third-person shooter set in the Gears of War universe.',
                'release_date' => '2019-09-10',
                'platform' => 'Xbox',
                'cover_img' => 'gears5.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Splatoon 3',
                'description' => 'Ink up the Splatlands with new weapons, gear, and chaotic multiplayer fun in Nintendo’s stylish shooter sequel.',
                'release_date' => '2022-09-09',
                'platform' => 'Nintendo',
                'cover_img' => 'splatoon3.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Resident Evil 4 Remake',
                'description' => 'A reimagining of the iconic survival horror classic where Leon Kennedy fights to rescue the president’s daughter from a rural cult.',
                'release_date' => '2023-03-24',
                'platform' => 'PC',
                'cover_img' => 're4remake.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Final Fantasy VII Remake',
                'description' => 'Revisit the world of Midgar with updated visuals and combat as Cloud and company battle against the megacorporation Shinra.',
                'release_date' => '2020-04-10',
                'platform' => 'PS',
                'cover_img' => 'ff7remake.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Sea of Thieves',
                'description' => 'Set sail with friends in this shared-world pirate adventure filled with exploration, treasure, and sea monsters.',
                'release_date' => '2018-03-20',
                'platform' => 'Xbox',
                'cover_img' => 'seaofthieves.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Pokémon Scarlet and Violet',
                'description' => 'Explore the open-world Paldea region, catching and battling Pokémon in this next evolution of the beloved series.',
                'release_date' => '2022-11-18',
                'platform' => 'Nintendo',
                'cover_img' => 'pokemon-sv.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Star Wars Jedi: Survivor',
                'description' => 'Cal Kestis returns in this story-driven Star Wars action game, blending lightsaber combat and exploration across the galaxy.',
                'release_date' => '2023-04-28',
                'platform' => 'PC',
                'cover_img' => 'jedisurvivor.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'The Last of Us Part II',
                'description' => 'Ellie’s brutal quest for revenge unfolds in a harrowing tale of morality and survival in a post-apocalyptic world.',
                'release_date' => '2020-06-19',
                'platform' => 'PS',
                'cover_img' => 'tlou2.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Forza Motorsport',
                'description' => 'A new generation of realistic racing simulation featuring dynamic time, weather, and detailed car customization.',
                'release_date' => '2023-10-10',
                'platform' => 'Xbox',
                'cover_img' => 'forza8.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Mario Kart 8 Deluxe',
                'description' => 'The definitive kart racing experience featuring iconic Nintendo characters, creative tracks, and frantic multiplayer fun.',
                'release_date' => '2017-04-28',
                'platform' => 'Nintendo',
                'cover_img' => 'mk8.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'DOOM Eternal',
                'description' => 'Rip and tear through hordes of demons in this fast-paced first-person shooter with refined combat and heavy metal energy.',
                'release_date' => '2020-03-20',
                'platform' => 'PC',
                'cover_img' => 'doom-eternal.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Horizon Forbidden West',
                'description' => 'Aloy explores a majestic but dangerous frontier filled with new machines and ancient mysteries in this open-world adventure.',
                'release_date' => '2022-02-18',
                'platform' => 'PS',
                'cover_img' => 'hfw.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Hi-Fi Rush',
                'description' => 'A rhythm-based action game where combat and music sync perfectly as you battle robotic foes in a colorful world.',
                'release_date' => '2023-01-25',
                'platform' => 'Xbox',
                'cover_img' => 'hifirush.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Luigi’s Mansion 3',
                'description' => 'Join Luigi and Gooigi as they explore a haunted hotel full of puzzles, ghosts, and charm in this delightful adventure.',
                'release_date' => '2019-10-31',
                'platform' => 'Nintendo',
                'cover_img' => 'luigi3.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Half-Life: Alyx',
                'description' => 'A VR-exclusive prequel to Half-Life 2, where Alyx Vance leads the human resistance against the Combine.',
                'release_date' => '2020-03-23',
                'platform' => 'PC',
                'cover_img' => 'alyx.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Uncharted 4: A Thief’s End',
                'description' => 'Nathan Drake embarks on one last globe-trotting adventure filled with treasure, betrayal, and breathtaking action.',
                'release_date' => '2016-05-10',
                'platform' => 'PS',
                'cover_img' => 'uncharted4.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Fable',
                'description' => 'A whimsical reboot of the beloved fantasy RPG series, promising humor, adventure, and moral choice.',
                'release_date' => '2026-03-15',
                'platform' => 'Xbox',
                'cover_img' => 'fable.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'The Legend of Zelda: Tears of the Kingdom',
                'description' => 'Link soars between floating islands and explores a transformed Hyrule in this ambitious sequel to Breath of the Wild.',
                'release_date' => '2023-05-12',
                'platform' => 'Nintendo',
                'cover_img' => 'totk.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Alan Wake 2',
                'description' => 'A psychological horror sequel where a writer’s nightmares become reality in a dark, twisted world.',
                'release_date' => '2023-10-27',
                'platform' => 'PC',
                'cover_img' => 'alanwake2.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Ratchet & Clank: Rift Apart',
                'description' => 'Jump between dimensions instantly in this fast-paced, visually stunning action-platformer for next-gen PlayStation.',
                'release_date' => '2021-06-11',
                'platform' => 'PS',
                'cover_img' => 'riftapart.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Starfield: Beyond',
                'description' => 'A massive expansion to the acclaimed space RPG, introducing new star systems and storylines.',
                'release_date' => '2025-07-15',
                'platform' => 'Xbox',
                'cover_img' => 'starfield-beyond.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Super Smash Bros. Ultimate',
                'description' => 'The ultimate crossover brawler featuring every fighter in the series and more iconic characters from across gaming.',
                'release_date' => '2018-12-07',
                'platform' => 'Nintendo',
                'cover_img' => 'smashu.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Control',
                'description' => 'Discover the mysteries of the Federal Bureau of Control in this supernatural third-person shooter by Remedy.',
                'release_date' => '2019-08-27',
                'platform' => 'PC',
                'cover_img' => 'control.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'The Last Guardian',
                'description' => 'A boy and his giant creature companion, Trico, embark on an emotional journey of trust and friendship.',
                'release_date' => '2016-12-06',
                'platform' => 'PS',
                'cover_img' => 'lastguardian.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Hellblade II: Senua’s Saga',
                'description' => 'Senua returns in a dark journey through myth and madness, rendered with groundbreaking visuals and haunting sound design.',
                'release_date' => '2024-05-21',
                'platform' => 'Xbox',
                'cover_img' => 'hellblade2.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Pikmin 4',
                'description' => 'Command adorable plant-like creatures to explore, battle, and solve puzzles in this charming strategy adventure.',
                'release_date' => '2023-07-21',
                'platform' => 'Nintendo',
                'cover_img' => 'pikmin4.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Bioshock Infinite',
                'description' => 'Explore the floating city of Columbia as Booker DeWitt in a tale of redemption, revolution, and quantum mystery.',
                'release_date' => '2013-03-26',
                'platform' => 'PC',
                'cover_img' => 'bioshockinf.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Gran Turismo 7',
                'description' => 'Experience realistic driving simulation with a vast car lineup, stunning visuals, and deep tuning systems.',
                'release_date' => '2022-03-04',
                'platform' => 'PS',
                'cover_img' => 'gt7.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Avowed',
                'description' => 'An immersive first-person RPG from Obsidian set in the world of Eora, filled with magic, exploration, and choice.',
                'release_date' => '2025-02-18',
                'platform' => 'Xbox',
                'cover_img' => 'avowed.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Kirby and the Forgotten Land',
                'description' => 'Kirby explores a mysterious abandoned world in his first full 3D adventure filled with charm and creativity.',
                'release_date' => '2022-03-25',
                'platform' => 'Nintendo',
                'cover_img' => 'kirbyfl.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Death Stranding',
                'description' => 'A mysterious post-apocalyptic delivery adventure where connection is humanity’s last hope.',
                'release_date' => '2019-11-08',
                'platform' => 'PC',
                'cover_img' => 'deathstranding.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Shadow of the Colossus',
                'description' => 'A lone hero faces sixteen towering beasts in a haunting quest for love and redemption.',
                'release_date' => '2018-02-06',
                'platform' => 'PS',
                'cover_img' => 'sotc.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'State of Decay 3',
                'description' => 'Survive and rebuild society in a frozen, zombie-infested wilderness in this next entry in the survival series.',
                'release_date' => '2025-06-10',
                'platform' => 'Xbox',
                'cover_img' => 'sod3.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Paper Mario: The Origami King',
                'description' => 'Join Mario on a papercraft adventure to stop the evil King Olly and restore peace to the Mushroom Kingdom.',
                'release_date' => '2020-07-17',
                'platform' => 'Nintendo',
                'cover_img' => 'origamiking.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Half-Life',
                'description' => 'Valve’s groundbreaking first-person shooter that redefined storytelling and immersion in video games.',
                'release_date' => '1998-11-19',
                'platform' => 'PC',
                'cover_img' => 'halflife.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Metal Gear Solid',
                'description' => 'A stealth-action masterpiece where Solid Snake infiltrates Shadow Moses Island to stop a nuclear threat.',
                'release_date' => '1998-09-03',
                'platform' => 'PS',
                'cover_img' => 'mgs1.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Halo: Combat Evolved',
                'description' => 'The game that launched a franchise — Master Chief battles the Covenant on the mysterious Halo ringworld.',
                'release_date' => '2001-11-15',
                'platform' => 'Xbox',
                'cover_img' => 'haloce.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Super Mario 64',
                'description' => 'Mario’s 3D debut revolutionized gaming with its open worlds and precise platforming controls.',
                'release_date' => '1996-06-23',
                'platform' => 'Nintendo',
                'cover_img' => 'mario64.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Doom',
                'description' => 'The 1993 classic that defined first-person shooters — fast, brutal, and endlessly replayable.',
                'release_date' => '1993-12-10',
                'platform' => 'PC',
                'cover_img' => 'doom.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Final Fantasy VII',
                'description' => 'A genre-defining JRPG where Cloud Strife and his allies battle the sinister Shinra Corporation and Sephiroth.',
                'release_date' => '1997-01-31',
                'platform' => 'PS',
                'cover_img' => 'ff7.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Banjo-Kazooie',
                'description' => 'A beloved 3D platformer where a bear and a bird team up to rescue Banjo’s sister from the evil witch Gruntilda.',
                'release_date' => '1998-06-29',
                'platform' => 'Nintendo',
                'cover_img' => 'banjokazooie.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'The Elder Scrolls III: Morrowind',
                'description' => 'A vast open-world RPG filled with lore, freedom, and unforgettable quests on the island of Vvardenfell.',
                'release_date' => '2002-05-01',
                'platform' => 'Xbox',
                'cover_img' => 'morrowind.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Chrono Trigger',
                'description' => 'A legendary JRPG about time travel, friendship, and saving the world from apocalypse.',
                'release_date' => '1995-03-11',
                'platform' => 'Nintendo',
                'cover_img' => 'chronotrigger.jpg',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'System Shock 2',
                'description' => 'A terrifying and innovative sci-fi FPS/RPG hybrid where an AI named SHODAN haunts every corner.',
                'release_date' => '1999-08-11',
                'platform' => 'PC',
                'cover_img' => 'systemshock2.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'GoldenEye 007',
                'description' => 'Rare’s groundbreaking console shooter based on the James Bond film, featuring iconic split-screen multiplayer.',
                'release_date' => '1997-08-25',
                'platform' => 'Nintendo',
                'cover_img' => 'goldeneye007.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Resident Evil 2',
                'description' => 'A survival horror classic following Leon S. Kennedy and Claire Redfield as they try to escape a zombie outbreak in Raccoon City.',
                'release_date' => '1998-01-21',
                'platform' => 'PS',
                'cover_img' => 're2.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'The Elder Scrolls II: Daggerfall',
                'description' => 'An enormous open-world RPG that pushed boundaries with its massive procedurally generated world.',
                'release_date' => '1996-08-31',
                'platform' => 'PC',
                'cover_img' => 'daggerfall.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'Crash Bandicoot',
                'description' => 'A classic PlayStation platformer starring the wacky marsupial on his quest to stop Dr. Cortex.',
                'release_date' => '1996-09-09',
                'platform' => 'PS',
                'cover_img' => 'crashbandicoot.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'title' => 'The Legend of Zelda: A Link to the Past',
                'description' => 'A top-down action-adventure that set the template for future Zelda games with its dual-world design and epic storytelling.',
                'release_date' => '1991-11-21',
                'platform' => 'Nintendo',
                'cover_img' => 'alinktothepast.webp',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ]
        ]);
    }
}
