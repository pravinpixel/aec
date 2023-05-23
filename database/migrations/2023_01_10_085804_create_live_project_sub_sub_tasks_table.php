<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveProjectSubSubTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_project_sub_sub_tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('sub_task_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('parent')->nullable();
            $table->integer('chart_task_id')->nullable();
            $table->integer('sort_order')->nullable();
            $table->text('name')->nullable();
            $table->integer('assign_to')->nullable();
            $table->boolean('status')->default(false);
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('delivery_date')->nullable();
            $table->integer('progress_percentage')->nullable();
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
        Schema::dropIfExists('live_project_sub_sub_tasks');
    }
}
