<?php

namespace Database\Seeders;

use App\Models\PairingStatistic;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    const STANDINGS_FILE = 'Standings.csv';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (($handle = fopen(DatabaseSeeder::leaguePath() . self::STANDINGS_FILE, "r")) !== FALSE) {
            $teamCol = array_search("TEAM", fgetcsv($handle, 1000, ","));
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $newTeam = Team::create(['name' => $data[$teamCol]]);
                $this->createPairingStatistic($newTeam->id, $data[3], $data[4], $data[5]);
                DatabaseSeeder::createGameStatistic($newTeam->id, 'App\Models\Team', $data[6], $data[7]);
            }
            fclose($handle);
        }
    }

    public function createPairingStatistic($teamId, $wins, $losses, $ties)
    {
        return PairingStatistic::create([
            'team_id' => $teamId,
            'season_id' => '1',
            'pairing_wins' => $wins,
            'pairing_losses' => $losses,
            'pairing_ties' => $ties
        ]);
    }
}
