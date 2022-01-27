<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', "SearchController@index")->name('home');
Route::get('/search', "SearchController@search")->name('search');
Route::get('/artists/{id}', "ArtistController@details")->name('artist.details');
Route::get('/albums/{id}', "AlbumController@details")->name('album.details');
Route::get('/tracks/{id}', "TrackController@details")->name('track.details');