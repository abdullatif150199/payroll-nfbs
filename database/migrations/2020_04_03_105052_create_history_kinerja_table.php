<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryKinerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_kinerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gaji_id');
            $table->foreign('gaji_id')->references('id')->on('gaji')->onDelete('cascade');
            $table->string('title');
            $table->decimal('value', 3, 0)->default(0);
            $table->decimal('after_count', 5, 2)->nullable();
            $table->string('unit', 100)->nullable();
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
        Schema::dropIfExists('history_kinerja');
    }
}
