<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTeamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_team_user', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->primary(array('team_id', 'user_id'));

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_team_user');
    }
}
