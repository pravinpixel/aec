<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGanttTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gantt_tasks', function (Blueprint $table) {
            $table->id('id');
            $table->string('text');
            $table->integer('duration');
            $table->float('progress');
            $table->timestamp('start_date');
            $table->integer('parent');
            $table->string('type');
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
        Schema::dropIfExists('gantt_tasks');
    }
}
