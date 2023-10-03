<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calendar_event_user', function (Blueprint $table) {
            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('calendar_events')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('user_id')->constrained()->index()->name('calendar_event_user_foreign')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['event_id', 'user_id']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendar_event_user');
    }
};
