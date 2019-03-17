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
Route::get('/logout', function(){
  return 'ok';
})->name('logout');
Route::get('/level','LevelController@show');
Route::get('/user','UserController@index');
Route::get('/user/tambah','UserController@add');
Route::get('/user/{id}','UserController@edit')->name('user.edit');
Route::post('/user/tambah','UserController@store')->name('user.store');
Route::put('/user/{id}','UserController@update')->name('user.update');
Route::delete('/user/{id}','UserController@delete');
Route::get('/masakan','MenuController@index');
Route::get('/masakan/tambah','MenuController@add');
Route::post('/masakan/tambah','MenuController@store')->name('menu.store');
Route::get('/masakan/{id}','MenuController@edit')->name('menu.edit');
Route::post('/masakan/{id}','MenuController@update')->name('menu.update');
Route::delete('/masakan/{id}','MenuController@delete')->name('menu.delete');
Route::get('/level/{id}','LevelController@edit')->name('level.edit');
Route::post('/level/{id}','LevelController@update')->name('level.update');
Route::post('/login','LoginController@login')->name('login');
Route::get('/transaksi','TransactionController@index');
Route::get('/transaksi/{rowId}','TransactionController@removeCart')->name('cart.remove');
Route::post('/transaksi/{id}','TransactionController@addCart')->name('cart.add');
Route::get('/cek', function(){
  return Cart::content();
});

