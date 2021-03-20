<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelompok_kerja_id')->nullable();
            $table->foreign('kelompok_kerja_id')->references('id')->on('kelompok_kerja')->onDelete('cascade');
            $table->string('nama_jabatan', 100);
            $table->decimal('tunjangan_jabatan', 10, 0)->default(0);
            $table->decimal('jml_jam_ajar', 10, 0)->default(0);
            $table->tinyInteger('load')->default(0);
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
        Schema::dropIfExists('jabatan');
    }
}
