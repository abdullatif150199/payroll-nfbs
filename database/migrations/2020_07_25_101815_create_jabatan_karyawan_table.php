<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatanKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan_karyawan', function (Blueprint $table) {
            $table->foreignId('jabatan_id');
            $table->foreignId('karyawan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jabatan_karyawan');
    }
}
