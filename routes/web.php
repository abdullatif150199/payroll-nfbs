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
    // dd(App\Bidang::all()->random(3)->pluck('nama_bidang')->toArray());
    return view('profile.index');
});

Route::get('/dashboard', 'HomeController@index')->name('home');

// Karyawan
Route::get('/dashboard/karyawan', 'KaryawanController@index');
Route::get('/dashboard/get-karyawan', 'KaryawanController@getKaryawan')->name('getKaryawan');
Route::post('/dashboard/karyawan', 'KaryawanController@store')->name('storeKaryawan');
Route::get('/dashboard/karyawan/{id}/edit', 'KaryawanController@edit')->name('editKaryawan');
Route::put('/dashboard/karyawan/{id}', 'KaryawanController@update')->name('updateKaryawan');
Route::put('/dashboard/karyawan/{id}/resign', 'KaryawanController@resign')->name('resignKaryawan');

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
Route::post('/dashboard/potongan/{id}/attach', 'PotonganController@attach')->name('attachPotongan');
Route::get('/dashboard/potongan-karyawan/{id}', 'PotonganController@showPotonganKaryawan')->name('showPotonganKaryawan');
Route::put('/dashboard/potongan/{id}', 'PotonganController@update')->name('updatePotongan');
Route::delete('/dashboard/potongan/{id}', 'PotonganController@delete')->name('hapusPotongan');
Route::delete('/dashboard/potongan/{potongan_id}/{karyawan_id}', 'PotonganController@detach')->name('detachPotongan');

// Golongan
Route::get('/dashboard/golongan', 'GolonganController@index');
Route::get('/dashboard/get-golongan', 'GolonganController@getGolongan')->name('getGolongan');
Route::post('/dashboard/golongan', 'GolonganController@store')->name('storeGolongan');
Route::get('dashboard/golongan/{id}/edit', 'GolonganController@edit')->name('editGolongan');
Route::put('dashboard/golongan/{id}', 'GolonganController@update')->name('updateGolongan');
