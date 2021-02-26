<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gaji_id');
            $table->foreign('gaji_id')->references('id')->on('gaji')->onDelete('cascade');
            $table->decimal('gaji_perbulan', 14, 2)->nullable();
            $table->decimal('gaji_pertahun', 14, 2)->nullable();
            $table->decimal('thr', 14, 2)->nullable();
            $table->decimal('penghasilan_bruto', 14, 2)->nullable();
            $table->decimal('biaya_jabatan', 14, 2)->nullable();
            $table->decimal('penghasilan_neto', 14, 2)->nullable();
            $table->decimal('ptkp_pertahun', 14, 2)->nullable();
            $table->decimal('pkp_pertahun', 14, 2)->nullable();
            $table->decimal('pph21_pertahun', 14, 2)->nullable();
            $table->decimal('pph21_perbulan', 14, 2)->nullable();
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
        Schema::dropIfExists('tax_histories');
    }
}
