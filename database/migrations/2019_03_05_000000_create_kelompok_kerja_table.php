<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelompokKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_kerja', function (Blueprint $table) {
            $table->id();
            $table->char('grade');
            $table->decimal('persen', 5, 2)->comment('dari gapok');
            $table->decimal('kinerja_normal', 14, 0);
            $table->tinyInteger('no_kode')->default(0)->comment('untuk pembuatan no_induk');
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
        Schema::dropIfExists('kelompok_kerja');
    }
}
