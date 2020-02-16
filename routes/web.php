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

Route::group(['prefix' => 'dashboard', 'as' => 'dash.', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:root|admin']], function () {
        Route::get('/', 'HomeController@index')->name('home');

        // Karyawan
        Route::get('karyawan', 'KaryawanController@index');
        Route::get('get-karyawan', 'KaryawanController@getKaryawan')->name('getKaryawan');
        Route::post('karyawan', 'KaryawanController@store')->name('storeKaryawan');
        Route::get('karyawan/{id}/edit', 'KaryawanController@edit')->name('editKaryawan');
        Route::put('karyawan/{id}', 'KaryawanController@update')->name('updateKaryawan');
        Route::put('karyawan/{id}/resign', 'KaryawanController@resign')->name('resignKaryawan');

        // Daftar Gaji
        Route::get('gaji', 'GajiController@index');
        Route::get('get-gaji', 'GajiController@getGaji')->name('getGaji');

        // Kehadiran
        Route::get('kehadiran', 'KehadiranController@index');
        Route::get('get-kehadiran', 'KehadiranController@getKehadiran')->name('getKehadiran');

        // Cuti
        Route::get('cuti', 'CutiController@index');
        Route::get('get-cuti', 'CutiController@getCuti')->name('getCuti');

        // Potongan
        Route::get('potongan', 'PotonganController@index');
        Route::get('get-potongan', 'PotonganController@getPotongan')->name('getPotongan');
        Route::post('potongan', 'PotonganController@store')->name('storePotongan');
        Route::get('potongan/{id}/edit', 'PotonganController@edit')->name('editPotongan');
        Route::post('potongan/{id}/attach', 'PotonganController@attach')->name('attachPotongan');
        Route::get('potongan-karyawan/{id}', 'PotonganController@showPotonganKaryawan')->name('showPotonganKaryawan');
        Route::put('potongan/{id}', 'PotonganController@update')->name('updatePotongan');
        Route::delete('potongan/{id}', 'PotonganController@delete')->name('hapusPotongan');
        Route::delete('potongan/{potongan_id}/{karyawan_id}', 'PotonganController@detach')->name('detachPotongan');

        Route::group(['prefix' => 'setting'], function () {
            // Setting
            Route::get('/', 'SettingController@index')->name('setting');

            // Golongan
            Route::get('golongan', 'GolonganController@index')->name('golongan');
            Route::get('get-golongan', 'GolonganController@getGolongan')->name('getGolongan');
            Route::post('golongan', 'GolonganController@store')->name('storeGolongan');
            Route::get('golongan/{id}/edit', 'GolonganController@edit')->name('editGolongan');
            Route::put('golongan/{id}', 'GolonganController@update')->name('updateGolongan');

            // Kelompok Kerja
            Route::get('kelompok-kerja', 'KelompokKerjaController@index')->name('kelompokKerja');
            Route::get('get-kelompok-kerja', 'KelompokKerjaController@getKelompokKerja')->name('getKelompokKerja');
            Route::post('kelompok-kerja', 'KelompokKerjaController@store')->name('storeKelompokKerja');
            Route::get('kelompok-kerja/{id}/edit', 'KelompokKerjaController@edit')->name('editKelompokKerja');
            Route::put('kelompok-kerja/{id}', 'KelompokKerjaController@update')->name('updateKelompokKerja');

             // Device fingerprint
            Route::get('device', 'DeviceController@index')->name('device');
            Route::get('get-device', 'DeviceController@getDevice')->name('getDevice');
            Route::post('device', 'DeviceController@store')->name('storeDevice');
            Route::get('device/{id}/edit', 'DeviceController@edit')->name('editDevice');
            Route::put('device/{id}', 'DeviceController@update')->name('updateDevice');
            Route::delete('device/{id}', 'DeviceController@destroy')->name('hapusDevice');
        });
    });
});
