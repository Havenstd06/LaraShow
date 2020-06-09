<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class SeriesViewModel extends ViewModel
{
    public $populaires;
    public $notes;
    public $genres;

    public function __construct($populaires, $notes, $genres)
    {
        $this->populaires = $populaires;
        $this->notes = $notes;
        $this->genres = $genres;
    }

    public function populaires() 
    {
        return $this->FormatSeries($this->populaires);
    }

    public function notes() 
    {
        return $this->FormatSeries($this->notes);
    }

    public function genres() 
    {

        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function FormatSeries($serie)
    {
        return collect($serie)->map(function ($serie) {
            $genresFormatted = collect($serie['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($serie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $serie['poster_path'],
                'first_air_date' => Carbon::parse($serie['first_air_date'])->format('d M, Y'),
                'vote_average' => $serie['vote_average'] ? $serie['vote_average'] . '/10' : 'NR',
                'genres' => $genresFormatted,
            ])->only(
                'poster_path', 'first_air_date', 'vote_average', 'genres', 'genre_ids', 'id', 'name'
            );
        });
    }
}
