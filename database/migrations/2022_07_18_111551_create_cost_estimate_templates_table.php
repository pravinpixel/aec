<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostEstimateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_estimate_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('json')->nullable();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->on('employees')->references('id');
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
        Schema::dropIfExists('cost_estimate_templates');
    }
}
