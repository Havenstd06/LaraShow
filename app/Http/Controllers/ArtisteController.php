<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        // dump($viewModel);

        return view('artiste.index', $viewModel);
    }
}
