<?php

namespace App\View\Components;

use Closure;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GameForm extends Component
{
    /**
     * Create a new component instance.
     */

    public ?Game $game;
    public $genres;

    public function __construct(Game $game = null, $genres = [])
    {
        $this->game = $game;
        $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-form');
    }
}
