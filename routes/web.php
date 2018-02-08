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
    return view('login');
});

Route::get('/home', function () {
    return view('user');
});

Route::get('/login', function(){
	return view('login');
});

Route::post('/login', 'anggotaController@testLogin');
Route::post('/', 'anggotaController@testLogin');

Route::get('/blank', function() {
	return view('blank');
});



Route::group(['middleware' => ['web']], function() {
  // Anggota
  Route::resource('anggota','anggotaController');
  Route::post('anggota/daftar','anggotaController@tambah');
  Route::post('anggota/edit','anggotaController@update');
  Route::post('anggota/hapus','anggotaController@hapus');

  // Barang
  Route::resource('barang','barangController');
  Route::post('barang/daftar','barangController@tambah');
  Route::post('barang/edit', 'barangController@update');
  Route::post('barang/hapus','barangController@hapus');

  // Pembelian
  Route::get('pembelian', 'pembelianController@tampil');
  Route::get('pembelian/autocomplete', 'pembelianController@autocomplete');
  Route::post('pembelian/input', 'pembelianController@input');
  Route::post('pembelian/edit', 'pembelianController@update');
  Route::post('pembelian/hapus', 'pembelianController@hapus');
});
