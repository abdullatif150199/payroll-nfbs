<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id');
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
            $table->text('body');
            $table->enum('status', [1,2])->comment('unread/read');
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
        Schema::dropIfExists('reply_messages');
    }
}
