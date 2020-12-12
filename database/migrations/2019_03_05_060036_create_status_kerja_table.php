<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_status_kerja', 25);
            $table->decimal('persentase_gaji_pokok', 5, 2);
            $table->tinyInteger('maks_jam_lembur_day')->default(0);
            $table->tinyInteger('maks_jam_lembur_week')->default(0);
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
        Schema::dropIfExists('status_kerja');
    }
}
