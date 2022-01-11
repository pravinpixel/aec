<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GanttChart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gantt_chart', function (Blueprint $table) {
            $table->id();
            $table->string('text')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('target')->nullable();
            $table->string('source')->nullable();
            $table->string('type')->nullable();
            $table->string('duration')->nullable();
            $table->string('progress')->nullable();
            $table->string('status')->nullable();
            $table->string('open')->nullable();
            $table->string('parent')->nullable(); 
            $table->unsignedBigInteger('created_by')->nullable();
            $table->softDeletes();
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
