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

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    Route::get('/', 'ProfileController@index');
    Route::get('kehadiran', 'ProfileController@kehadiran')->name('kehadiran');
    Route::get('get-kehadiran/{id}', 'ProfileController@getKehadiran')->name('getKehadiran');
    // Profile/Cuti
    Route::get('cuti', 'ProfileController@cuti')->name('cuti');
    Route::get('cuti/create', 'ProfileController@createCuti')->name('createCuti');
    Route::post('cuti/store', 'ProfileController@storeCuti')->name('storeCuti');
    Route::get('cuti/{id}/edit', 'ProfileController@editCuti')->name('editCuti');
    Route::put('cuti/{id}', 'ProfileController@updateCuti')->name('updateCuti');
    Route::get('get-cuti/{id}', 'ProfileController@getCuti')->name('getCuti');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dash.', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:root|admin']], function () {
        Route::get('/', 'HomeController@index')->name('home');

        // Karyawan
        Route::get('karyawan', 'KaryawanController@index');
        Route::get('get-karyawan', 'KaryawanController@getKaryawan')->name('getKaryawan');
        Route::post('karyawan', 'KaryawanController@store')->name('storeKaryawan');
        Route::get('karyawan/{id}', 'KaryawanController@show')->name('showKaryawan');
        Route::get('karyawan/{id}/edit', 'KaryawanController@edit')->name('editKaryawan');
        Route::put('karyawan/{id}', 'KaryawanController@update')->name('updateKaryawan');
        Route::put('karyawan/{id}/resign', 'KaryawanController@resign')->name('resignKaryawan');

        // Daftar Gaji
        Route::get('gaji', 'GajiController@index');
        Route::get('get-gaji', 'GajiController@getGaji')->name('getGaji');

        // Kehadiran
        Route::get('kehadiran', 'KehadiranController@index')->name('kehadiran');
        Route::get('get-kehadiran', 'KehadiranController@getKehadiran')->name('getKehadiran');
        Route::get('get-pilihan', 'KehadiranController@getPilihan')->name('getKehadiranPilihan');
        Route::get('kehadiran/{id}/edit', 'KehadiranController@edit')->name('editKehadiran');
        Route::put('kehadiran/{id}', 'KehadiranController@update')->name('updateKehadiran');

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
            Route::get('/', 'UserController@index')->name('setting');
            Route::get('get-user', 'UserController@getUser')->name('getUser');

            // Golongan
            Route::get('golongan', 'GolonganController@index')->name('golongan');
            Route::get('get-golongan', 'GolonganController@getGolongan')->name('getGolongan');
            Route::post('golongan', 'GolonganController@store')->name('storeGolongan');
            Route::get('golongan/{id}/edit', 'GolonganController@edit')->name('editGolongan');
            Route::put('golongan/{id}', 'GolonganController@update')->name('updateGolongan');
            Route::delete('golongan/{id}', 'GolonganController@destroy')->name('hapusGolongan');

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
            Route::post('device/{id}/check', 'DeviceController@check')->name('checkDevice');
        });
    });
});
