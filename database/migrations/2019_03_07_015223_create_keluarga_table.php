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
            $table->increments('id');
            $table->integer('karyawan_id')->unsigned();
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->string('nama', 150);
            $table->integer('status_keluarga_id')->unsigned();
            $table->foreign('status_keluarga_id')->references('id')->on('status_keluarga')->onDelete('cascade');
            $table->date('tanggal_lahir');
            $table->decimal('tunjangan_pendidikan', 10,0)->nullable();
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
