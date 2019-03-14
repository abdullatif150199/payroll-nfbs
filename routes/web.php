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

// Daftar Gaji
Route::get('/dashboard/gaji', 'GajiController@index');
Route::get('/dashboard/get-gaji', 'GajiController@getGaji')->name('getGaji');
