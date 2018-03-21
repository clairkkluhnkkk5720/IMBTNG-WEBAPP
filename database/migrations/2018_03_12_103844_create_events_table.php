<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('details')->nullable();
            $table->timestamp('live_at')->nullable();
            $table->string('live_link')->nullable();
            $table->string('banner')->nullable();
            $table->string('thumb')->nullable();
            $table->integer('game_id')->unsigned();
            $table->integer('event_category_id')->unsigned();
            $table->integer('winner_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('game_id')
                ->references('id')->on('games')
                ->onDelete('cascade');

            $table->foreign('event_category_id')
                ->references('id')->on('event_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
