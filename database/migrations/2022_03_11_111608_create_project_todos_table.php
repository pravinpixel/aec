<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('project_todos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('enquiry_id');
            $table->unsignedBigInteger('assign_to');
            $table->unsignedBigInteger('assign_by');
            $table->unsignedBigInteger('task_id');
            $table->date('date_of_delivery');
            $table->boolean('status')->default(0);
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->foreign('assign_to')->references('id')->on('employee');
            $table->foreign('assign_by')->references('id')->on('employee');
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
        Schema::dropIfExists('project_todos');
    }
}
