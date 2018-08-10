<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('player_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->boolean('is_completed')->default(false);

            $table->foreign('room_id')->references('room_id')->on('room')->onDelete('cascade');
            $table->foreign('player_id')->references('player_id')->on('player')->onDelete('cascade');
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
        Schema::dropIfExists('role_statuses');
    }
}
