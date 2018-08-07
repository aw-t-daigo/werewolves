<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player', function (Blueprint $table) {
            $table->increments('player_id');
            $table->integer('room_id')->unsigned();
            $table->string('player_name', 10);
            $table->boolean('is_dead')->default(false);
            $table->integer('role_id')->unsigned();

            $table->foreign('room_id')->references('room_id')->on('room')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('role_mst');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player');
    }
}
