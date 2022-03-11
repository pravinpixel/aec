<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTeamSetups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_team_setups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('employee_id');
            $table->boolean('add')->default(0);
            $table->boolean('edit')->default(0);
            $table->boolean('delete')->default(0);
            $table->boolean('view')->default(0);
            $table->boolean('comments')->default(0);
            $table->boolean('download')->default(0);
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('employee_id')->references('id')->on('employee');
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
        Schema::dropIfExists('project_team_setups');
    }
}
