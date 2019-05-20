<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pcs_number')->nullable();
            $table->string('pcs_description',255);
            $table->date('pcs_initial_date')->nullable();
            $table->date('pcs_final_date')->nullable();
            $table->boolean('pcs_state')->nullable();
            $table->enum('pcs_current_step', [1, 2, 3, 4, 5, 6]);
            $table->string('pcs_comments',255)->nullable();
            $table->string('pcs_document')->nullable();
            $table->integer('dpt_id')->unsigned();
            $table->foreign('dpt_id')->references('id')->on('departments');
            $table->integer('mcp_id')->unsigned();
            $table->foreign('mcp_id')->references('id')->on('municipalities');
            $table->integer('usr_id')->unsigned();
            $table->foreign('usr_id')->references('id')->on('users');
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
        Schema::dropIfExists('processes');
    }
}
