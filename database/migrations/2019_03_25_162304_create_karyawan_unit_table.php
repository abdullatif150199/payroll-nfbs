<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan_unit', function (Blueprint $table) {
            $table->foreignId('karyawan_id');
            $table->foreignId('unit_id');
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('unit')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan_unit');
    }
}
