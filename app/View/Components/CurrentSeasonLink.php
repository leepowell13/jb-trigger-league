<?php

namespace App\View\Components;

use App\Models\Season;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CurrentSeasonLink extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.current-season-link', [
            'currentSeason' => Season::currentSeason()
        ]);
    }
}
