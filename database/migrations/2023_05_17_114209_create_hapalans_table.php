<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHapalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hapalans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id');
            $table->string('tanggal')->nullable();
            $table->string('nama')->nullable();
            $table->string('juz')->nullable();
            $table->string('dari_halaman')->nullable();
            $table->string('sampai_halaman')->nullable();
            $table->string('surat')->nullable();
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
        Schema::dropIfExists('hapalans');
    }
}
