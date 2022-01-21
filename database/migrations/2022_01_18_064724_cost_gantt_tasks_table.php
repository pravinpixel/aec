<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CostGanttTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_gantt_tasks', function (Blueprint $table) {
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
        //
    }
}
