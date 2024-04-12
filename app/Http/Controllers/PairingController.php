<?php

namespace App\Http\Controllers;

use App\Models\Pairing;
use App\Models\Season;
use Illuminate\Http\Request;

class PairingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Season $season)
    {
        return view('pairings.index', [
            'pairings' => Pairing::where('season_id', $season->id)->with(['teams', 'stage'])->get(),
            'season' => $season
        ]);
    }
}
