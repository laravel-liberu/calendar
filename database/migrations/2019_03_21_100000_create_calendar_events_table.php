<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_id')->nullable()->unsigned()->index();

            $table->integer('calendar_id')->unsigned()->index();
            $table->foreign('calendar_id')->index()
                ->references('id')->on('calendars')->name('calendar_events_calendar_id_foreign')->onDelete('cascade');

            $table->string('title');
            $table->text('body')->nullable();
            $table->tinyInteger('frequency');

            $table->date('start_date')->index();
            $table->time('start_time');
            $table->date('end_date')->index();
            $table->time('end_time');

            $table->date('recurrence_ends_at')->nullable();

            $table->boolean('is_all_day');

            $table->string('location')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->index()->name('calendar_events_created_by_foreign');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendar_events');
    }
};
