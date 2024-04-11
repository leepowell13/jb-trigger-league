<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Pairing;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultsSeeder extends Seeder
{
    const GAMES_FILE = 'Games.csv';
    const RESULTS_FILE = 'Results.csv';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leaguePath = DatabaseSeeder::leaguePath();

        if (($gamesFile = fopen($leaguePath . self::GAMES_FILE, "r")) !== FALSE && ($resultsFile = fopen($leaguePath . self::RESULTS_FILE, "r")) !== FALSE) {
            fgetcsv($resultsFile, 1000, ",");
            while (($result = fgetcsv($resultsFile, 1000, ",")) !== FALSE) {
                $week = $result[5];
                $newPairing = $this->createPairing($result[4], $week);
                $numOfGames = $week <= 9 ? 8 : 7;
                $this->attachTeamsToPairing($result, $numOfGames, $newPairing);

                $gameBatch = $this->createGameBatch($numOfGames, $newPairing->id);
                foreach ($gameBatch as $game) {
                    if (($gameResult = fgetcsv($gamesFile, 1000, ",")) !== FALSE) {
                        $this->attachPlayersToGame($gameResult, $game);
                    }
                }
            }
        }
    }

    public function createGameBatch($numOfGames, $pairingId)
    {
        for ($i = 0; $i < $numOfGames; $i++) {
            $gameBatch[] = Game::create([
                'pairing_id' => $pairingId
            ]);
        }

        return $gameBatch;
    }

    public function attachPlayerToGame($discordId, $result, Game $game)
    {
        Player::firstWhere('discord_id', $discordId)->games()->attach($game->id, ['result_id' => $result]);
    }

    public function attachPlayersToGame(array $gameResult, Game $game)
    {
        $this->attachPlayerToGame($gameResult[0], $gameResult[1], $game);
        $this->attachPlayerToGame($gameResult[3], $gameResult[2], $game);
    }

    public function createPairing($stage, $week)
    {
        return Pairing::create([
            'season_id' => '1',
            'stage_id' => $stage,
            'week' => $week
        ]);
    }

    public function attachTeamToPairing($teamId, $teamWins, $teamLosses, Pairing $pairing)
    {
        Team::firstWhere('id', $teamId)->pairings()->attach($pairing->id, ['game_wins' => $teamWins, 'game_losses' => $teamLosses]);
    }

    public function attachTeamsToPairing(array $pairingResult, $gamesPlayed, Pairing $pairing)
    {
        $this->attachTeamToPairing($pairingResult[0], $pairingResult[2], $this->teamLosses($gamesPlayed, $pairingResult[2]), $pairing);
        $this->attachTeamToPairing($pairingResult[1], $pairingResult[3], $this->teamLosses($gamesPlayed, $pairingResult[3]), $pairing);
    }

    public function teamLosses($gamesPlayed, $teamWins)
    {
        return $gamesPlayed - $teamWins;
    }
}
