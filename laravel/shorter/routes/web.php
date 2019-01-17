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
Auth::routes();

//Page d'acceuil avec le formulaire
Route::get('/', function () {
    return view('welcome');
});

//lien pour récuperer le formulaire
Route::post('/link/generate', 'LinkController@generate');

//Lien pour rediriger
Route::get('/{short_link}', 'LinkController@redirect');

Route::get('/stats/{short_link}', 'LinkController@getStats');

Route::get('/user/{id}/links', 'UserController@links')->middleware('auth');
Route::get('/link/delete/{id}', 'LinkController@delete')->middleware('auth');