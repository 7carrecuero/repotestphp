<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mcp_name');
            $table->integer('dpt_id')->unsigned();
            $table->foreign('dpt_id')->references('id')->on('departments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipalities');
    }
}
