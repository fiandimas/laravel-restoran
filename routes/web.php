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
    return view('template');
});
Route::get('/login', function(){
  return view('auth.login');
});

Route::get('/level','LevelController@show');
Route::get('/user','UserController@index');
Route::get('/masakan','MenuController@index');
Route::get('/level/{id}','LevelController@edit')->name('level.edit');
Route::post('/level/{id}','LevelController@update')->name('level.update');
Route::post('/login','LoginController@login')->name('login');

Route::get('/hash', function(){
  return Hash::make('scarlet');
});
