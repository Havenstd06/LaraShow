<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function films()
    {
        return view('films.index');
    }

    public function series()
    {
        return view('series.index');
    }

    public function acteurs()
    {
        return view('acteurs.index');
    }
}
