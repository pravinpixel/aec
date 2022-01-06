<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterCalculationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_calculation', function (Blueprint $table) {
            $table->id();
            $table->string('component_id')->nullable();
            $table->string('type_id')->nullable();
            $table->string('sqm')->nullable();
            $table->string('complexity')->nullable();
            $table->string('detail_price')->nullable();
            $table->string('detail_sum')->nullable();
            $table->string('statistic_price')->nullable();
            $table->string('statistic_sum')->nullable();
            $table->string('cad_cam_price')->nullable();
            $table->string('cad_cam_sum')->nullable();
            $table->string('logistic_price')->nullable();
            $table->string('logistic_sum')->nullable();
            $table->string('total_price')->nullable();
            $table->string('total_sum')->nullable();
            $table->string('status')->nullable();
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
