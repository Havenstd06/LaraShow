<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function series()
    {
        return view('series.index');
    }

    public function show()
    {
        return view('series.show');
    }
}
