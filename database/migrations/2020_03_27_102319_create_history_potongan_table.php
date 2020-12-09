<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryPotonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_potongan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gaji_id');
            $table->foreign('gaji_id')->references('id')->on('gaji')->onDelete('cascade');
            $table->foreignId('rekening_id');
            $table->foreign('rekening_id')->references('id')->on('rekenings')->onDelete('cascade');
            $table->string('nama');
            $table->decimal('jumlah', 14, 0)->default(0);
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
        Schema::dropIfExists('history_potongan');
    }
}
