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
Route::get('/','LoginController@index');
Route::get('/masuk', function(){
  return view('auth.login');
});
Route::post('/login','LoginController@login')->name('login');

// Level Action
Route::get('/level','LevelController@show');
Route::get('/level/{id}','LevelController@edit')->name('level.edit');

// User Action
Route::get('/pengguna','UserController@index');
Route::get('/pengguna/{id}','UserController@edit')->name('user.edit');

// Menu Action
Route::get('/masakan','MenuController@index');
Route::get('/masakan/tambah','MenuController@add');
Route::get('/masakan/{id}','MenuController@edit')->name('menu.edit');
Route::post('/masakan/tambah','MenuController@store')->name('menu.store');
Route::put('/masakan/{id}','MenuController@update')->name('menu.update');
Route::delete('/masakan/{id}','MenuController@delete')->name('menu.delete');

// Transaction Action
Route::get('/transaksi','TransactionController@index')->name('transaction');
Route::get('/transaksi/hapus','TransactionController@destroyCart')->name('cart.destroy');
Route::get('/transaksi/{rowId}','TransactionController@removeCart')->name('cart.remove');
Route::get('/transaksi/{id}/{status}','TransactionController@addCart')->name('cart.add');
Route::post('/transaksi/save','TransactionController@buy')->name('transaction.buy');

// Report Action
Route::get('/laporan','ReportController@index');
Route::get('/laporan/{id}','ReportController@print')->name('report.print');

// Logout Action
Route::get('/keluar', function(){
  Session::flush();
  return redirect('/masuk');
})->name('logout');

