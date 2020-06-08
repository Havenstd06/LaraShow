<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class FilmsViewModel extends ViewModel
{
    public $populaires;
    public $enSalles;
    public $genres;

    public function __construct($populaires, $enSalles, $genres)
    {
        $this->populaires = $populaires;
        $this->enSalles = $enSalles;
        $this->genres = $genres;
    }

    public function populaires() 
    {
        return $this->FormatMovies($this->populaires);
    }

    public function enSalles() 
    {
        return $this->FormatMovies($this->enSalles);
    }

    public function genres() 
    {

        return $genres = collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function FormatMovies($film)
    {
        return collect($film)->map(function ($film) {
            $genresFormatted = collect($film['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($film)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $film['poster_path'],
                'release_date' => Carbon::parse($film['release_date'])->format('d M, Y'),
                'vote_average' => $film['vote_average'] ? $film['vote_average'] . '/10' : 'NR',
                'genres' => $genresFormatted,
            ])->only(
                'poster_path', 'release_date', 'vote_average', 'genres', 'genre_ids', 'id', 'title'
            );
        });
    }
}
