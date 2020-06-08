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

Route::get('/', 'FilmController@films')->name('films');
Route::get('/films/{film}', 'FilmController@show')->name('films.show');

Route::get('/series', 'SerieController@series')->name('series');
// Route::get('/series/show', 'SerieController@show')->name('films.show');
