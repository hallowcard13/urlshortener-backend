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

Route::get('/{id}', 'URLShortenerController@redirectShortlinks');
Route::get('api/create','URLShortenerController@create');
Route::get('api/showlinks','URLShortenerController@show');
Route::post('api/createurl', 'URLShortenerController@store')->name('createlink');