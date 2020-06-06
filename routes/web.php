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

Route::get('/', 'ViewController@films')->name('films');
Route::get('/series', 'ViewController@series')->name('series');
Route::get('/acteurs', 'ViewController@acteurs')->name('acteurs');
