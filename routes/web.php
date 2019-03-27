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
    return view('auth.login');
});

Auth::routes();

Route::get('/profile', function () {
    return view('profile.index');
});

Route::get('/dashboard', 'HomeController@index')->name('home');

// Karyawan
Route::get('/dashboard/karyawan', 'KaryawanController@index');
Route::get('/dashboard/get-karyawan', 'KaryawanController@getKaryawan')->name('getKaryawan');
Route::post('/dashboard/karyawan', 'KaryawanController@store')->name('storeKaryawan');
Route::get('/dashboard/karyawan/{id}/edit', 'KaryawanController@edit')->name('editKaryawan');

// Daftar Gaji
Route::get('/dashboard/gaji', 'GajiController@index');
Route::get('/dashboard/get-gaji', 'GajiController@getGaji')->name('getGaji');

// Kehadiran
Route::get('/dashboard/kehadiran', 'KehadiranController@index');
Route::get('/dashboard/get-kehadiran', 'KehadiranController@getKehadiran')->name('getKehadiran');

// Cuti
Route::get('/dashboard/cuti', 'CutiController@index');
Route::get('/dashboard/get-cuti', 'CutiController@getCuti')->name('getCuti');

// Potongan
Route::get('/dashboard/potongan', 'PotonganController@index');
Route::get('/dashboard/get-potongan', 'PotonganController@getPotongan')->name('getPotongan');
Route::post('/dashboard/potongan', 'PotonganController@store')->name('storePotongan');
Route::get('/dashboard/potongan/{id}/edit', 'PotonganController@edit')->name('editPotongan');
Route::put('/dashboard/potongan/{id}', 'PotonganController@update')->name('updatePotongan');
Route::delete('/dashboard/potongan/{id}', 'PotonganController@delete')->name('deletePotongan');
