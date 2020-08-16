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
    return redirect()->route('login');
});

Auth::routes();

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth', 'role:root|admin|user']], function () {
    Route::get('/', 'Profile\ProfileController@index');
    Route::any('{username}/detail', 'Profile\ProfileController@edit')->name('detail');

    Route::get('gaji', 'Profile\GajiController@index')->name('gaji.index');
    Route::get('get-gaji/{id}', 'Profile\GajiController@datatable')->name('gaji.datatable');

    Route::get('kehadiran', 'Profile\KehadiranController@index')->name('kehadiran.index');
    Route::get('get-kehadiran/{id}', 'Profile\KehadiranController@datatable')->name('kehadiran.datatable');

    // Profile/Cuti
    Route::get('cuti', 'Profile\CutiController@index')->name('cuti.index');
    Route::get('cuti/create', 'Profile\CutiController@create')->name('cuti.create');
    Route::post('cuti/store', 'Profile\CutiController@store')->name('cuti.store');
    Route::get('cuti/{id}/edit', 'Profile\CutiController@edit')->name('cuti.edit');
    Route::put('cuti/{id}', 'Profile\CutiController@update')->name('cuti.update');
    Route::get('get-cuti/{id}', 'Profile\CutiController@datatable')->name('cuti.datatable');

    // Messages
    Route::get('komplain', 'Profile\KomplainController@index')->name('komplain.index');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dash.', 'middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:root|admin|kabid']], function () {
        Route::get('/', 'HomeController@index')->name('home');

        // Karyawan
        Route::get('karyawan', 'KaryawanController@index');
        Route::get('get-karyawan', 'KaryawanController@datatable')->name('karyawan.datatable');
        Route::post('karyawan', 'KaryawanController@store')->name('karyawan.store');
        Route::get('karyawan/get-name', 'KaryawanController@name')->name('karyawan.name');
        Route::get('karyawan/{id}', 'KaryawanController@show')->name('karyawan.show');
        Route::get('karyawan/{id}/edit', 'KaryawanController@edit')->name('karyawan.edit');
        Route::put('karyawan/{id}', 'KaryawanController@update')->name('karyawan.update');
        Route::put('karyawan/{id}/resign', 'KaryawanController@resign')->name('karyawan.resign');

        // Daftar Gaji
        Route::get('gaji', 'GajiController@index');
        Route::get('get-gaji', 'GajiController@datatable')->name('gaji.datatable');
        Route::post('get-gaji', 'GajiController@calculate')->name('gaji.calculate');

        // Daftar Insentif
        Route::get('insentif', 'InsentifController@index');
        Route::get('get-insentif', 'InsentifController@datatable')->name('insentif.datatable');
        Route::post('insentif', 'InsentifController@store')->name('insentif.store');
        Route::get('insentif/{id}/edit', 'InsentifController@edit')->name('insentif.edit');
        Route::put('insentif/{id}', 'InsentifController@update')->name('insentif.update');
        Route::delete('insentif/{id}', 'InsentifController@destroy')->name('insentif.destroy');

        // Daftar Kinerja
        Route::get('kinerja', 'KinerjaController@index');
        Route::get('get-kinerja', 'KinerjaController@datatable')->name('kinerja.datatable');
        Route::post('kinerja', 'KinerjaController@store')->name('kinerja.store');
        Route::get('kinerja-karyawan/{id}', 'KinerjaController@show')->name('kinerja.show');
        Route::post('kinerja/{id}/attach', 'KinerjaController@attach')->name('kinerja.attach');
        Route::get('kinerja/{id}/edit', 'KinerjaController@edit')->name('kinerja.edit');
        Route::put('kinerja/{id}', 'KinerjaController@update')->name('kinerja.update');
        Route::delete('kinerja/{id}', 'KinerjaController@destroy')->name('kinerja.destroy');

        // Kehadiran
        Route::get('kehadiran', 'KehadiranController@index')->name('kehadiran');
        Route::get('get-kehadiran', 'KehadiranController@datatable')->name('kehadiran.datatable');
        Route::get('get-pilihan', 'KehadiranController@pilihan')->name('kehadiran.pilihan');
        Route::get('kehadiran/{id}/edit', 'KehadiranController@edit')->name('kehadiran.edit');
        Route::put('kehadiran/{id}', 'KehadiranController@update')->name('kehadiran.update');

        // Cuti
        Route::get('cuti', 'CutiController@index');
        Route::get('get-cuti', 'CutiController@datatable')->name('cuti.datatable');

        // Potongan
        Route::get('potongan', 'PotonganController@index');
        Route::get('get-potongan', 'PotonganController@datatable')->name('potongan.datatable');
        Route::post('potongan', 'PotonganController@store')->name('potongan.store');
        Route::get('potongan/get-name', 'PotonganController@name')->name('potongan.name');
        Route::get('potongan/{id}/edit', 'PotonganController@edit')->name('potongan.edit');
        Route::post('potongan/{id}/attach', 'PotonganController@attach')->name('potongan.attach');
        Route::get('potongan-karyawan/{id}', 'PotonganController@show')->name('potongan.show');
        Route::put('potongan/{id}', 'PotonganController@update')->name('potongan.update');
        Route::delete('potongan/{id}', 'PotonganController@destroy')->name('potongan.destroy');
        Route::delete('potongan/{potongan_id}/{karyawan_id}/delete', 'PotonganController@detach')->name('potongan.detach');

        Route::group(['prefix' => 'setting'], function () {
            // General
            Route::get('/', 'Settingcontroller@index')->name('setting');

            // User
            Route::get('user', 'UserController@index')->name('user');
            Route::get('get-user', 'UserController@datatable')->name('user.datatable');

            // Jabatan
            Route::get('jabatan', 'JabatanController@index')->name('jabatan');
            Route::get('get-jabatan', 'JabatanController@datatable')->name('jabatan.datatable');
            Route::post('jabatan', 'JabatanController@store')->name('jabatan.store');
            Route::get('jabatan/{jabatan}/edit', 'JabatanController@edit')->name('jabatan.edit');
            Route::put('jabatan/{jabatan}', 'JabatanController@update')->name('jabatan.update');
            Route::delete('jabatan/{jabatan}', 'JabatanController@destroy')->name('jabatan.destroy');

            // Golongan
            Route::get('golongan', 'GolonganController@index')->name('golongan');
            Route::get('get-golongan', 'GolonganController@datatable')->name('golongan.datatable');
            Route::post('golongan', 'GolonganController@store')->name('golongan.store');
            Route::get('golongan/{id}/edit', 'GolonganController@edit')->name('golongan.edit');
            Route::put('golongan/{id}', 'GolonganController@update')->name('golongan.update');
            Route::delete('golongan/{id}', 'GolonganController@destroy')->name('golongan.destroy');

            // Kelompok Kerja
            Route::get('kelompok-kerja', 'KelompokKerjaController@index')->name('kelompokKerja');
            Route::get('get-kelompok-kerja', 'KelompokKerjaController@datatable')->name('kelompokKerja.datatable');
            Route::post('kelompok-kerja', 'KelompokKerjaController@store')->name('kelompokKerja.store');
            Route::get('kelompok-kerja/{id}/edit', 'KelompokKerjaController@edit')->name('kelompokKerja.edit');
            Route::put('kelompok-kerja/{id}', 'KelompokKerjaController@update')->name('kelompokKerja.update');

             // Device fingerprint
            Route::get('device', 'DeviceController@index')->name('device');
            Route::get('get-device', 'DeviceController@datatable')->name('device.datatable');
            Route::post('device', 'DeviceController@store')->name('device.store');
            Route::get('device/{id}/edit', 'DeviceController@edit')->name('device.edit');
            Route::put('device/{id}', 'DeviceController@update')->name('device.update');
            Route::delete('device/{id}', 'DeviceController@destroy')->name('device.destroy');
            Route::post('device/{id}/check', 'DeviceController@check')->name('device.check');

            // Bulk Upload
            Route::get('bulk-upload', 'BulkUploadController@index')->name('bulkUpload');
            Route::post('bulk-upload', 'BulkUploadController@store')->name('bulkUpload.store');

            // Bidang
            Route::get('bidang', 'BidangController@index')->name('bidang');
            Route::get('get-bidang', 'BidangController@datatable')->name('bidang.datatable');
            Route::post('bidang', 'BidangController@store')->name('bidang.store');
            Route::get('bidang/{id}/edit', 'BidangController@edit')->name('bidang.edit');
            Route::put('bidang/{id}', 'BidangController@update')->name('bidang.update');
            Route::delete('bidang/{id}', 'BidangController@destroy')->name('bidang.destroy');

             // Unit
            Route::get('unit', 'UnitController@index')->name('unit');
            Route::get('get-unit', 'UnitController@datatable')->name('unit.datatable');
            Route::post('unit', 'UnitController@store')->name('unit.store');
            Route::get('unit/{id}/edit', 'UnitController@edit')->name('unit.edit');
            Route::put('unit/{id}', 'UnitController@update')->name('unit.update');
            Route::delete('unit/{id}', 'UnitController@destroy')->name('unit.destroy');

             // Status Keluarga
            Route::get('status-keluarga', 'StatusKeluargaController@index')->name('statusKeluarga');
            Route::get('get-status-keluarga', 'StatusKeluargaController@datatable')->name('statusKeluarga.datatable');
            Route::post('status-keluarga', 'StatusKeluargaController@store')->name('statusKeluarga.store');
            Route::get('status-keluarga/{id}/edit', 'StatusKeluargaController@edit')->name('statusKeluarga.edit');
            Route::put('status-keluarga/{id}', 'StatusKeluargaController@update')->name('statusKeluarga.update');
            Route::delete('status-keluarga/{id}', 'StatusKeluargaController@destroy')->name('statusKeluarga.destroy');

             // Status Kerja
            Route::get('status-kerja', 'StatusKerjaController@index')->name('statusKerja');
            Route::get('get-status-kerja', 'StatusKerjaController@datatable')->name('statusKerja.datatable');
            Route::post('status-kerja', 'StatusKerjaController@store')->name('statusKerja.store');
            Route::get('status-kerja/{id}/edit', 'StatusKerjaController@edit')->name('statusKerja.edit');
            Route::put('status-kerja/{id}', 'StatusKerjaController@update')->name('statusKerja.update');
            Route::delete('status-kerja/{id}', 'StatusKerjaController@destroy')->name('statusKerja.destroy');

             // Persentase Kinerja
            Route::get('persentase-kinerja', 'PersentaseKinerjaController@index')->name('persentaseKinerja');
            Route::get('get-persentase-kinerja', 'PersentaseKinerjaController@datatable')->name('persentaseKinerja.datatable');
            Route::post('persentase-kinerja', 'PersentaseKinerjaController@store')->name('persentaseKinerja.store');
            Route::get('persentase-kinerja/{id}/edit', 'PersentaseKinerjaController@edit')->name('persentaseKinerja.edit');
            Route::put('persentase-kinerja/{id}', 'PersentaseKinerjaController@update')->name('persentaseKinerja.update');
            Route::delete('persentase-kinerja/{id}', 'PersentaseKinerjaController@destroy')->name('persentaseKinerja.destroy');

             // Nilai Kinerja
            Route::get('nilai-kinerja', 'NilaiKinerjaController@index')->name('nilaiKinerja');
            Route::get('get-nilai-kinerja', 'NilaiKinerjaController@datatable')->name('nilaiKinerja.datatable');
            Route::post('nilai-kinerja', 'NilaiKinerjaController@store')->name('nilaiKinerja.store');
            Route::get('nilai-kinerja/{id}/edit', 'NilaiKinerjaController@edit')->name('nilaiKinerja.edit');
            Route::put('nilai-kinerja/{id}', 'NilaiKinerjaController@update')->name('nilaiKinerja.update');
            Route::delete('nilai-kinerja/{id}', 'NilaiKinerjaController@destroy')->name('nilaiKinerja.destroy');

            // Jam Perpekan
            Route::get('jam-perpekan', 'JamPerpekanController@index')->name('jamPerpekan');
            Route::get('get-jam-perpekan', 'JamPerpekanController@datatable')->name('jamPerpekan.datatable');
            Route::post('jam-perpekan', 'JamPerpekanController@store')->name('jamPerpekan.store');
            Route::get('jam-perpekan/{jam}/edit', 'JamPerpekanController@edit')->name('jamPerpekan.edit');
            Route::put('jam-perpekan/{jam}', 'JamPerpekanController@update')->name('jamPerpekan.update');
            Route::delete('jam-perpekan/{jam}', 'JamPerpekanController@destroy')->name('jamPerpekan.destroy');
        });
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
