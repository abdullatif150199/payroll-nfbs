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
            $table->id();
            $table->foreignId('karyawan_id');
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->char('bulan', 7);
            $table->decimal('gaji_pokok', 10, 2);
            $table->decimal('tunjangan_jabatan', 10, 2)->nullable();
            $table->decimal('tunjangan_fungsional', 10, 2)->nullable();
            $table->decimal('tunjangan_struktural', 10, 2)->nullable();
            $table->decimal('tunjangan_kinerja', 10, 2)->nullable();
            $table->decimal('tunjangan_pendidikan', 10, 2)->nullable();
            $table->decimal('tunjangan_istri', 10, 2)->nullable();
            $table->decimal('tunjangan_anak', 10, 2)->nullable();
            $table->decimal('tunjangan_hari_raya', 10, 2)->nullable();
            $table->decimal('lembur', 10, 2)->nullable();
            $table->decimal('lain_lain', 10, 2)->nullable();
            $table->decimal('insentif', 10, 2)->nullable();
            $table->decimal('potongan', 10, 2)->nullable();
            $table->decimal('gaji_total', 10, 2);
            $table->decimal('gaji_akhir', 10, 2);
            $table->enum('approved', ['N', 'Y'])->nullable();
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
