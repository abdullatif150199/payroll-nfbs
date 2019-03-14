<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karyawan_id')->unsigned();
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->char('bulan', 7);
            $table->decimal('gaji_pokok', 10);
            $table->decimal('tunjangan_jabatan', 10)->nullable();
            $table->decimal('tunjangan_pendidikan', 10)->nullable();
            $table->decimal('tunjangan_istri', 10)->nullable();
            $table->decimal('tunjangan_anak', 10)->nullable();
            $table->decimal('lembur', 10)->nullable();
            $table->decimal('lain_lain', 10)->nullable();
            $table->decimal('insentif', 10)->nullable();
            $table->decimal('potongan', 10)->nullable();
            $table->decimal('gaji_akhir', 10);
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
        Schema::dropIfExists('gaji');
    }
}
