<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('karyawan_id');
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->string('nama', 150);
            $table->foreignId('status_keluarga_id');
            $table->foreign('status_keluarga_id')->references('id')->on('status_keluarga')->onDelete('cascade');
            $table->date('tanggal_lahir');
            $table->decimal('tunjangan_pendidikan', 10, 2)->nullable();
            $table->date('akhir_tunj_pendidikan');
            $table->date('akhir_tunj_keluarga');
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
        Schema::dropIfExists('keluarga');
    }
}
