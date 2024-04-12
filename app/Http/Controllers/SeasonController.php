<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Season $season)
    {
        return view('seasons.show', [
            'season' => $season
        ]);
    }
}
