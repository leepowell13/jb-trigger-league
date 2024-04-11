<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    const PLAYERS_FILE = 'PlayerStats.csv';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (($handle = fopen(DatabaseSeeder::leaguePath() . self::PLAYERS_FILE, "r")) !== FALSE) {
            $header = fgetcsv($handle, 1000, ",");
            $nameCol = array_search("Name", $header);
            $teamId = array_search("Team", $header);
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $playerStats[] = $data;
                $newPlayer = Player::create([
                    'discord_id' => $data[$nameCol],
                    'team_id' => $data[$teamId]
                ]);

                DatabaseSeeder::createGameStatistic($newPlayer->id, 'App\Models\Player', $data[2], $data[3]);
            }
            fclose($handle);
        }
    }
}
