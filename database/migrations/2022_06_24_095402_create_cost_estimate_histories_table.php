<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostEstimateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_estimate_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiry_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('cost_estimate_id');
            $table->string('type');
            $table->text('history');
            $table->foreign('enquiry_id')->on('enquiries')->references('id');
            $table->foreign('created_by')->on('employee')->references('id');
            $table->foreign('cost_estimate_id')->on('enquiry_cost_estimates')->references('id');
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
        Schema::dropIfExists('cost_estimate_histories');
    }
}
