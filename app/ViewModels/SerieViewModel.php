<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class SerieViewModel extends ViewModel
{
    public $serie;
    public $serieEn;

    public function __construct($serie, $serieEn)
    {
        $this->serie = $serie;
        $this->serieEn = $serieEn;
    }

    public function serie()
    {
        return collect($this->serie)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->serie['poster_path'],
            'first_air_date' => Carbon::parse($this->serie['first_air_date'])->format('d M, Y'),
            'vote_average' => $this->serie['vote_average'] ? $this->serie['vote_average'] . '/10' : 'NR',
            'number_of_seasons' => $this->serie['number_of_seasons'] ? $this->serie['number_of_seasons'] . ' saisons' : '',
            'number_of_episodes' => $this->serie['number_of_episodes'] ? $this->serie['number_of_episodes'] . ' episodes' : '',
            'genres' => collect($this->serie['genres'])->pluck('name')->flatten()->implode(', '),
            'overview' => $this->serie['overview'] ? $this->serie['overview'] : $this->serieEn['overview'],
            'crew' => collect($this->serie['credits']['crew'])->where('job', 'Executive Producer')->take(3),
            'castText' => collect($this->serie['credits']['cast'])->take(3),
            'castImage' => collect($this->serie['credits']['cast'])->take(5),
            'images' => collect($this->serieEn['images']['backdrops'])->take(9),
        ])->only([
            'poster_path', 'first_air_date', 'vote_average', 'number_of_seasons', 'number_of_episodes', 'genres',
            'overview', 'crew', 'castText', 'castImage', 'images', 'name', 'videos'
        ]);
    }

    public function serieEn()
    {
        return $this->serieEn;
    }
}
