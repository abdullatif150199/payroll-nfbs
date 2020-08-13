<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiKinerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_kinerja', function (Blueprint $table) {
            $table->id();
            $table->char('nilai', 1)->comment('ex: A, B, C');
            $table->decimal('min_persen', 6,4)->comment('persentase');
            $table->decimal('max_persen', 6,4)->comment('persentase');
            $table->decimal('result_persen', 6,4)->comment('hasil yang akan di peroleh');
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
        Schema::dropIfExists('nilai_kinerja');
    }
}
