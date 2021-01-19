<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('pin', 10)->nullable();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreignId('golongan_id');
            $table->foreign('golongan_id')->references('id')->on('golongan')->onDelete('restrict');
            $table->foreignId('tarif_lembur_id')->nullable();
            $table->foreign('tarif_lembur_id')->references('id')->on('tarif_lembur')->onDelete('restrict');
            $table->foreignId('status_kerja_id');
            $table->foreign('status_kerja_id')->references('id')->on('status_kerja')->onDelete('restrict');
            $table->foreignId('kelompok_kerja_id');
            $table->foreign('kelompok_kerja_id')->references('id')->on('kelompok_kerja')->onDelete('restrict');
            $table->char('no_induk', 6)->nullable();
            $table->char('nik', 16)->nullable();
            $table->string('nama_lengkap', 100);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('status_pernikahan', ['M', 'B']);
            $table->string('alamat', 255);
            $table->string('no_hp', 25);
            $table->string('nama_pendidikan', 150)->nullable();
            $table->enum('pendidikan_terakhir', ['TS', 'SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'])->nullable();
            $table->string('jurusan')->nullable();
            $table->char('tahun_lulus', 4)->nullable();
            $table->tinyInteger('total_load')->default(0);
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('nama_bank', 100)->nullable();
            $table->string('no_rekening', 20)->nullable();
            $table->string('rekening_atas_nama', 150)->nullable();
            $table->enum('status', ['1', '2', '3'])->comment('1 == guru, 2 == non guru, 3 == berhenti');
            $table->enum('tipe_kerja', ['shift', 'non shift'])->default('non shift');
            $table->foreignId('jam_perpekan_id');
            $table->foreign('jam_perpekan_id')->references('id')->on('jam_perpekan')->onDelete('restrict');
            $table->date('contract_expired')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
