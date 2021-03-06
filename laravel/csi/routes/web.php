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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/blog/post/search/{name}', 'ArticleController@postByTitle');


Route::get('/blog/post/create', 'ArticleController@create');


Route::post('/blog/post/create', 'ArticleController@store');

Route::get('/blog/post/{id}', 'ArticleController@display');


Route::get('/blog/post/delete/{id}', 'ArticleController@delete');




