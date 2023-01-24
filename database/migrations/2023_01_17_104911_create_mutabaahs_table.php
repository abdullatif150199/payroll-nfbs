<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutabaahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutabaahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id');
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->enum('shubuh', ['y', 'n'])->nullable();
            $table->enum('dhuha', ['y', 'n', 'h'])->nullable();
            $table->enum('tilawah_quran', ['y', 'n', 'h'])->nullable();
            $table->enum('qiyamul_lail', ['y', 'n', 'h'])->nullable();
            $table->enum('dhuha', ['y', 'n'])->nullable();
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
        Schema::dropIfExists('mutabaahs');
    }
}
