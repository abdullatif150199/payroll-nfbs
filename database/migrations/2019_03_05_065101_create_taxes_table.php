<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 50);
            $table->decimal('ptkp_pertahun', 14, 2)->nullable();
            $table->decimal('ptkp_perbulan', 14, 2)->nullable();
            $table->decimal('persentase_pph21', 5, 2)->nullable();
            $table->decimal('persentase_biaya_jabatan', 5, 2)->nullable();
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
        Schema::dropIfExists('taxes');
    }
}
