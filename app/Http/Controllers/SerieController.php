<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\SerieViewModel;
use App\ViewModels\SeriesViewModel;
use Illuminate\Support\Facades\Http;

class SerieController extends Controller
{
    public function series()
    {
        $populaires = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/popular?language=fr')
            ->json()['results'];

        $notes = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/top_rated?language=fr')
            ->json()['results'];
        
        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/tv/list?language=fr')
            ->json()['genres'];

        $viewModel = new SeriesViewModel(
            $populaires,
            $notes,
            $genres,
        );

        return view('series.index', $viewModel);
    }

    public function show($id)
    {
        $serie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'.$id.'?language=fr&append_to_response=credits,videos,images')
            ->json();

        $serieEn = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=videos,images')
            ->json();

        $viewModel = new SerieViewModel(
            $serie,
            $serieEn
        );

        return view('series.show', $viewModel);
    }
}
