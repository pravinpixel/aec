<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveProjectGranttTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_project_grantt_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('text');
            $table->integer('duration')->nullable();
            $table->float('progress');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('parent');
            $table->string('type');
            $table->boolean('status')->default(0);
            $table->date('delivery_date')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('live_project_grantt_tasks');
    }
}
