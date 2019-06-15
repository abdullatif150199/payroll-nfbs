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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('golongan_id')->unsigned();
            $table->foreign('golongan_id')->references('id')->on('golongan')->onDelete('cascade');
            $table->integer('jabatan_id')->unsigned();
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
            $table->integer('status_kerja_id')->unsigned();
            $table->foreign('status_kerja_id')->references('id')->on('status_kerja')->onDelete('cascade');
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
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('nama_bank', 100)->nullable();
            $table->string('no_rekening', 20)->nullable();
            $table->string('rekening_atas_nama', 150)->nullable();
            $table->enum('status', ['1', '2', '3'])->comment('1 == guru, 2 == non guru, 3 == berhenti');
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
