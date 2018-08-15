<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('targeted')->unsigned();

            $table->foreign('room_id')->references('room_id')->on('room')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('role_mst');
            $table->foreign('targeted')->references('player_id')->on('player');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_statuses');
    }
}
