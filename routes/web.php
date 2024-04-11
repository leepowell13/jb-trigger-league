<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\TeamController;
use App\Models\Pairing;
use App\Models\Player;
use App\Models\Season;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('teams', TeamController::class)->only('index');
Route::resource('players', PlayerController::class)->only('index');
Route::get('/current-season', SeasonController::class)->name('currentSeason');

Route::get('/standings', function () {
    return view('standings', [
        'teams' => Team::with(['latestPairingStats', 'latestGameStats'])->get(),
    ]);
})->name('standings');

Route::get('/test', function () {
    return view('test', [
        'pairings' => Pairing::with(['games', 'teams', 'games.players'])->where('week', 1)->get()
    ]);
});

require __DIR__ . '/auth.php';
