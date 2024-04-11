<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    /**
     * Display current active season.
     */
    public function season()
    {
        return view('seasons.index', [
            'season' => Season::currentSeason(),
        ]);
    }
}
