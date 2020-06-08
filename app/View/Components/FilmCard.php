<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilmCard extends Component
{
    public $film;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($film)
    {
        $this->film = $film;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.film-card');
    }
}
