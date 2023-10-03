<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calendar_reminders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('calendar_events')
            ->name('calendar_reminders_event_id_foreign')->onDelete('cascade');

                $table->foreignId('created_by')->nullable()->constrained('users')->index()->name('calendar_reminders_created_by_foreign');

            $table->datetime('scheduled_at')->index();
            $table->datetime('sent_at')->nullable()->index();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendar_reminders');
    }
};
