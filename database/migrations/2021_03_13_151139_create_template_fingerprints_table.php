<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateFingerprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_fingerprints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fingerprint_id');
            $table->foreign('fingerprint_id')->references('id')->on('fingerprints')->onDelete('cascade');
            $table->text('template');
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
        Schema::dropIfExists('template_fingerprints');
    }
}
