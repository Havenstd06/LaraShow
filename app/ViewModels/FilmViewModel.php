<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class FilmViewModel extends ViewModel
{
    public $film;
    public $filmEn;

    public function __construct($film, $filmEn)
    {
        $this->film = $film;
        $this->filmEn = $filmEn;
    }

    public function film()
    {
        return collect($this->film)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->film['poster_path'],
            'release_date' => Carbon::parse($this->film['release_date'])->format('d M, Y'),
            'vote_average' => $this->film['vote_average'] ? $this->film['vote_average'] . '/10' : 'NR',
            'runtime' => $this->film['runtime'] ? $this->film['runtime'] . ' minutes' : '',
            'genres' => collect($this->film['genres'])->pluck('name')->flatten()->implode(', '),
            'overview' => $this->film['overview'] ? $this->film['overview'] : $this->filmEn['overview'],
            'director' => collect($this->film['credits']['crew'])->where('job', 'Director'),
            'castText' => collect($this->film['credits']['cast'])->take(3),
            'spoken_languages' => collect($this->film['spoken_languages'])->take(3),
            'castImage' => collect($this->film['credits']['cast'])->take(5),
            'images' => collect($this->filmEn['images']['backdrops'])->take(9),
        ])->only([
            'poster_path', 'release_date', 'vote_average', 'runtime', 'genres', 'overview', 'director', 'castText',
            'spoken_languages', 'castImage', 'images', 'title', 'videos'
        ]);
    }

    public function filmEn()
    {
        return $this->filmEn;
    }
}
