<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ArtisteViewModel extends ViewModel
{
    public $artiste;
    public $social;
    public $credits;

    public function __construct($artiste, $social, $credits)
    {
        $this->artiste = $artiste;
        $this->social = $social;
        $this->credits = $credits;
    }

    public function artiste()
    {
        $birth = new Carbon($this->artiste['birthday']);
        $death = new Carbon($this->artiste['deathday']);

        return collect($this->artiste)->merge([
            'profile_path' => $this->artiste['profile_path'] ? 
                    'https://image.tmdb.org/t/p/w300_and_h450_face'.$this->artiste['profile_path'] : 
                    'https://ui-avatars.com/api?size=300&name='.$this->artiste['name'],
            'age' => $this->artiste['deathday'] ? 'Décédé à '.$birth->diffInYears($death).' ans': $birth->diffInYears().' ans',
            'birthday' => Carbon::parse($this->artiste['birthday'])->format('d M, Y'),
            'biography' => $this->artiste['biography'] ? $this->artiste['biography'] : "Aucune biographie n'est disponible pour ". $this->artiste['name'].'.',
        ])->only([
            'birthday', 'age', 'deathday', 'name', 'gender', 'biography', 'place_of_birth', 'profile_path'
        ]);
    }

    public function social()
    {
        return collect($this->social)->merge([
            'twitter' => $this->social['twitter_id'] ? 'https://twitter.com/'.$this->social['twitter_id'] : null,
            'facebook' => $this->social['facebook_id'] ? 'https://facebook.com/'.$this->social['facebook_id'] : null,
            'instagram' => $this->social['instagram_id'] ? 'https://instagram.com/'.$this->social['instagram_id'] : null,
        ])->only([
            'facebook', 'instagram', 'twitter',
        ]);
    }

    public function knownForMovies()
    {
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->sortByDesc('popularity')->take(5)->map(function($film) {
            if (isset($film['title'])) {
                $title = $film['title'];
            } elseif (isset($film['name'])) {
                $title = $film['name'];
            } else {
                $title = 'Untitled';
            }

            return collect($film)->merge([
                'poster_path' => $film['poster_path']
                    ? 'https://image.tmdb.org/t/p/w185'.$film['poster_path']
                    : 'https://via.placeholder.com/185x278',
                'title' => $title,
                'linkToPage' => $film['media_type'] === 'movie' ? route('films.show', $film['id']) : route('series.show', $film['id'])
            ])->only([
                'poster_path', 'title', 'id', 'media_type', 'linkToPage',
            ]);
        });
    }

    public function credits()
    {
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->map(function($film) {
            if (isset($film['release_date'])) {
                $releaseDate = $film['release_date'];
            } elseif (isset($film['first_air_date'])) {
                $releaseDate = $film['first_air_date'];
            } else {
                $releaseDate = '';
            }

            if (isset($film['title'])) {
                $title = $film['title'];
            } elseif (isset($film['name'])) {
                $title = $film['name'];
            } else {
                $title = 'Pas de titre';
            }

            return collect($film)->merge([
                'release_date' => $releaseDate,
                'release_year' => isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Future',
                'title' => $title,
                'character' => isset($film['character']) ? $film['character'] : '',
                'linkToPage' => $film['media_type'] === 'movie' ? route('films.show', $film['id']) : route('series.show', $film['id']),
            ])->only([
                'release_date', 'release_year', 'title', 'character', 'linkToPage',
            ]);
        })->sortByDesc('release_date');
    }
}
