<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    public function films()
    {
        $populaires = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular?language=fr')
        ->json()['results'];

        $enSalles = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing?language=fr')
        ->json()['results'];
        
        $genresArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list?language=fr')
        ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        // dump($nowPlayings);

        return view('films.index', [
            'populaires' => $populaires,
            'enSalles' => $enSalles,
            'genres' => $genres
        ]);
    }

    public function show($id)
    {
        $film = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?language=fr&append_to_response=credits,videos,images')
        ->json();

        $filmEn = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=videos,images')
        ->json();

        $genresArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list?language=fr')
        ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        // dump($film);

        return view('films.show', [
            'film' => $film,
            'genres' => $genres,
            'filmEn' => $filmEn
        ]);
    }
}
