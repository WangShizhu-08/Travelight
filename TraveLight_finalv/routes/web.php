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

Route::get('/', function () {
    return redirect('/ideas');
});



Auth::routes();

Route::resource('profile', 'ProfileController');
Route::get('/ideas/{idea}/storecomment', 'IdeaController@storeComment');
Route::get('/ideas/{idea}/updatecomment', 'IdeaController@updateComment');
Route::resource('ideas', 'IdeaController');

// search engine
Route::get('/search','SearchController@search')->name('search');

