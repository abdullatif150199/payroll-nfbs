<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKehadiranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id');
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_istirahat')->nullable();
            $table->time('jam_kembali')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->date('tanggal');
            $table->enum('tipe', ['shift', 'non shift'])->default('non shift')->comment('Tipe Kehadiran');
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
        Schema::dropIfExists('kehadiran');
    }
}
