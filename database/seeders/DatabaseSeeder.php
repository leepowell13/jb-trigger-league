<?php

namespace Database\Seeders;

use App\Models\GameStatistic;
use App\Models\Result;
use App\Models\Season;
use App\Models\Stage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const STAGES = [
        'GR' => 'Group',
        'QF' => 'Quarter Final',
        'SF' => 'Semi Final',
        'FI' => 'Final',
        'TF' => 'Third Fourth playoff'
    ];

    const RESULTS = [
        'W' => 'Win',
        'L' => 'Loss',
        'T' => 'Tie'
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Season::create([
            'start_date' => '2023-09-30',
            'end_date' => '2023-12-23'
        ]);

        $this->call([
            TeamSeeder::class,
            PlayerSeeder::class
        ]);

        foreach (self::STAGES as $id => $name) {
            Stage::create([
                'id' => $id,
                'name' => $name
            ]);
        }

        foreach (self::RESULTS as $id => $name) {
            Result::create([
                'id' => $id,
                'name' => $name
            ]);
        }

        $this->call([
            ResultsSeeder::class
        ]);
    }

    public static function leaguePath()
    {
        return base_path('storage/league/');
    }

    public static function createGameStatistic($gameableId, $gameableType, $wins, $losses)
    {
        return GameStatistic::create([
            'gameable_id' => $gameableId,
            'gameable_type' => $gameableType,
            'season_id' => '1',
            'wins' => $wins,
            'losses' => $losses
        ]);
    }
}
