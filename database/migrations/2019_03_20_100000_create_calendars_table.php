<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('color');
            $table->boolean('private');

            $table->foreignId('created_by')->nullable()->constrained('users')->index()->name('calendars_created_by_foreign');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendars');
    }
};
