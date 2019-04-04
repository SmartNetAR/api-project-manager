<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_project_role')->unsigned();
            $table->date('date');
            $table->date('start');
            $table->date('finish');
            $table->text('description');
            $table->timestamps();

            $table->foreign('id_project_role')->references('id')->on('project_roles') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hours');
    }
}
