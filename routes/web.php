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

// Auth Action
Route::get('/','LoginController@index')->name('index');
Route::get('/masuk', function(){
  return view('auth.login');
});
Route::post('/login','LoginController@login')->name('login');

// Level Action
Route::get('/level','LevelController@index');

// User Action
Route::get('/pengguna','UserController@index');
Route::get('/pengguna/tambah','UserController@add');
Route::get('/pengguna/{id}','UserController@edit')->name('user.edit');
Route::post('/pengguna/tambah','UserController@store')->name('user.store');
Route::put('/pengguna/{id}','UserController@update')->name('user.update');
Route::delete('/pengguna/{id}','UserController@delete')->name('user.delete');

// Menu Action
Route::get('/masakan','MenuController@index');
Route::get('/masakan/tambah','MenuController@add');
Route::get('/masakan/{id}','MenuController@edit')->name('menu.edit');
Route::post('/masakan/tambah','MenuController@store')->name('menu.store');
Route::put('/masakan/{id}','MenuController@update')->name('menu.update');
Route::delete('/masakan/{id}','MenuController@delete')->name('menu.delete');

// Transaction Action
Route::get('/transaksi','TransactionController@index')->name('transaction');
Route::post('/transaksi/save','TransactionController@buy')->name('transaction.buy');
Route::get('/transaksi/destroy','TransactionController@destroyCart')->name('cart.destroy');
Route::get('/transaksi/{rowId}','TransactionController@removeCart')->name('cart.remove');
Route::get('/transaksi/{id}/{status}','TransactionController@addCart')->name('cart.add');

// Report Action
Route::get('/laporan','ReportController@index');
Route::get('/laporan/{id}','ReportController@print')->name('report.print');

Route::get('/keluar', function(){
  Session::flush();
  return redirect('/masuk');
})->name('logout');

