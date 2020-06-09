<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\FilmViewModel;
use App\ViewModels\FilmsViewModel;
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
        
        $genres = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list?language=fr')
        ->json()['genres'];

        $viewModel = new FilmsViewModel(
            $populaires,
            $enSalles,
            $genres,
        );

        return view('films.index', $viewModel);
    }

    public function show($id)
    {
        $film = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?language=fr&append_to_response=credits,videos,images')
            ->json();

        $filmEn = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=videos,images')
            ->json();

        $viewModel = new FilmViewModel(
            $film,
            $filmEn
        );

        return view('films.show', $viewModel);
    }
}
