<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleProcessStepApproverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_step_approver', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('psa_step');
            $table->integer('pcs_id')->unsigned();
            $table->foreign('pcs_id')->references('id')->on('processes');
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
        Schema::dropIfExists('process_step_approver');
    }
}
