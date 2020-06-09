<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SeriesCard extends Component
{
    public $serie;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($serie)
    {
        $this->serie = $serie;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.series-card');
    }
}
