<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsentifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insentif', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karyawan_id')->unsigned();
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->string('jenis_insentif', 10);
            $table->char('bulan', 2);
            $table->decimal('jumlah', 10,0);
            $table->string('keterangan', 225)->nullable();
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
        Schema::dropIfExists('insentif');
    }
}
