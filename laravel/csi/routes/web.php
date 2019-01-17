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

//Auth
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@checkLogin')->name('login.check');
Route::get('/logout', 'AuthController@logout');

//Admin
Route::get('/admin/home', 'AdminController@index')->middleware('auth2');
