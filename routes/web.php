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
    Route::get('gaji', 'ProfileController@gaji')->name('gaji');
    Route::get('get-gaji/{id}', 'ProfileController@getGaji')->name('getGaji');

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

        // Daftar Insentif
        Route::get('insentif', 'InsentifController@index');
        Route::get('get-insentif', 'InsentifController@getInsentif')->name('getInsentif');
        Route::post('insentif', 'InsentifController@store')->name('storeInsentif');
        Route::get('insentif/get-name', 'InsentifController@getName')->name('getName');
        Route::get('insentif/{id}/edit', 'InsentifController@edit')->name('editInsentif');
        Route::put('insentif/{id}', 'InsentifController@update')->name('updateInsentif');
        Route::delete('insentif/{id}', 'InsentifController@destroy')->name('hapusInsentif');

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

            // Bulk Upload
            Route::get('bulk-upload', 'BulkUploadController@index')->name('bulkUpload');
            Route::post('bulk-upload', 'BulkUploadController@store')->name('storeBulkUpload');

            // Bidang
            Route::get('bidang', 'BidangController@index')->name('bidang');
            Route::get('get-bidang', 'BidangController@getBidang')->name('getBidang');
            Route::post('bidang', 'BidangController@store')->name('storeBidang');
            Route::get('bidang/{id}/edit', 'BidangController@edit')->name('editBidang');
            Route::put('bidang/{id}', 'BidangController@update')->name('updateBidang');
            Route::delete('bidang/{id}', 'BidangController@destroy')->name('hapusBidang');

             // Unit
            Route::get('unit', 'UnitController@index')->name('unit');
            Route::get('get-unit', 'UnitController@getUnit')->name('getUnit');
            Route::post('unit', 'UnitController@store')->name('storeUnit');
            Route::get('unit/{id}/edit', 'UnitController@edit')->name('editUnit');
            Route::put('unit/{id}', 'UnitController@update')->name('updateUnit');
            Route::delete('unit/{id}', 'UnitController@destroy')->name('hapusUnit');

             // Status Keluarga
            Route::get('status-keluarga', 'StatusKeluargaController@index')->name('statusKeluarga');
            Route::get('get-status-keluarga', 'StatusKeluargaController@getStatusKeluarga')->name('getStatusKeluarga');
            Route::post('status-keluarga', 'StatusKeluargaController@store')->name('storeStatusKeluarga');
            Route::get('status-keluarga/{id}/edit', 'StatusKeluargaController@edit')->name('editStatusKeluarga');
            Route::put('status-keluarga/{id}', 'StatusKeluargaController@update')->name('updateStatusKeluarga');
            Route::delete('status-keluarga/{id}', 'StatusKeluargaController@destroy')->name('hapusStatusKeluarga');

             // Status Kerja
            Route::get('status-kerja', 'StatusKerjaController@index')->name('statusKerja');
            Route::get('get-status-kerja', 'StatusKerjaController@getStatusKerja')->name('getStatusKerja');
            Route::post('status-kerja', 'StatusKerjaController@store')->name('storeStatusKerja');
            Route::get('status-kerja/{id}/edit', 'StatusKerjaController@edit')->name('editStatusKerja');
            Route::put('status-kerja/{id}', 'StatusKerjaController@update')->name('updateStatusKerja');
            Route::delete('status-kerja/{id}', 'StatusKerjaController@destroy')->name('hapusStatusKerja');

             // Persentase Kinerja
            Route::get('persentase-kinerja', 'PersentaseKinerjaController@index')->name('persentaseKinerja');
            Route::get('get-persentase-kinerja', 'PersentaseKinerjaController@getPersentaseKinerja')->name('getPersentaseKinerja');
            Route::post('persentase-kinerja', 'PersentaseKinerjaController@store')->name('storePersentaseKinerja');
            Route::get('persentase-kinerja/{id}/edit', 'PersentaseKinerjaController@edit')->name('editPersentaseKinerja');
            Route::put('persentase-kinerja/{id}', 'PersentaseKinerjaController@update')->name('updatePersentaseKinerja');
            Route::delete('persentase-kinerja/{id}', 'PersentaseKinerjaController@destroy')->name('hapusPersentaseKinerja');

             // Nilai Kinerja
            Route::get('nilai-kinerja', 'NilaiKinerjaController@index')->name('nilaiKinerja');
            Route::get('get-nilai-kinerja', 'NilaiKinerjaController@getNilaiKinerja')->name('getNilaiKinerja');
            Route::post('nilai-kinerja', 'NilaiKinerjaController@store')->name('storeNilaiKinerja');
            Route::get('nilai-kinerja/{id}/edit', 'NilaiKinerjaController@edit')->name('editNilaiKinerja');
            Route::put('nilai-kinerja/{id}', 'NilaiKinerjaController@update')->name('updateNilaiKinerja');
            Route::delete('nilai-kinerja/{id}', 'NilaiKinerjaController@destroy')->name('hapusNilaiKinerja');

            // Jam Perpekan
            Route::get('jam-perpekan', 'JamPerpekanController@index')->name('jamPerpekan');
            Route::get('get-jam-perpekan', 'JamPerpekanController@getJamPerpekan')->name('getJamPerpekan');
            Route::post('jam-perpekan', 'JamPerpekanController@store')->name('storeJamPerpekan');
            Route::get('jam-perpekan/{id}/edit', 'JamPerpekanController@edit')->name('editJamPerpekan');
            Route::put('jam-perpekan/{id}', 'JamPerpekanController@update')->name('updateJamPerpekan');
            Route::delete('jam-perpekan/{id}', 'JamPerpekanController@destroy')->name('hapusJamPerpekan');
        });
    });
});
