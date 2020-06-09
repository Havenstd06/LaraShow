<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\ArtisteViewModel;
use Illuminate\Support\Facades\Http;
use App\ViewModels\ArtistesViewModel;

class ArtisteController extends Controller
{
    public function artistes($page = 1)
    {
        abort_if($page > 500, 204);

        $populaires = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/popular?page='.$page.'&language=fr')
        ->json()['results'];

        $viewModel = new ArtistesViewModel(
            $populaires,
            $page
        );

        return view('artiste.index', $viewModel);
    }

    public function show($id)
    {
        $artiste = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/person/'.$id.'?language=fr')
        ->json();

        $social = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids?language=fr')
            ->json();

        $credits = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits?language=fr')
            ->json();

        $viewModel = new ArtisteViewModel(
            $artiste,
            $social,
            $credits
        );

        return view('artiste.show', $viewModel);
    }
}
