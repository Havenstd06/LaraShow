<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Films
Route::get('/', 'FilmController@films')->name('films');
Route::get('/films/{film}', 'FilmController@show')->name('films.show');

// Route Séries
Route::get('/series', 'SerieController@series')->name('series');
// Route::get('/series/show', 'SerieController@show')->name('films.show');

// Route Artistes
Route::get('/artistes', 'ArtisteController@artistes')->name('artistes');
Route::get('/artistes/page/{page?}', 'ArtisteController@artistes')->name('artiste.pagination');
Route::get('/artistes/{artiste}', 'ArtisteControllerr@show')->name('artistes.show');