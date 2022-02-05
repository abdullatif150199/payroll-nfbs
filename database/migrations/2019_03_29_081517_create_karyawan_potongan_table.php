<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanPotonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan_potongan', function (Blueprint $table) {
            $table->foreignId('karyawan_id');
            $table->foreignId('potongan_id');
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->foreign('potongan_id')->references('id')->on('potongan')->onDelete('cascade');
            $table->date('end_at')->nullable();
            $table->string('keterangan')->nullable();
            $table->tinyInteger('qty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan_potongan');
    }
}
