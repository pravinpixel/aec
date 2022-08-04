<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicalEstimateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_estimate_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiry_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('technical_estimate_id');
            $table->longText('history');
            $table->foreign('enquiry_id')->on('enquiries')->references('id');
            $table->foreign('created_by')->on('employees')->references('id');
            $table->foreign('technical_estimate_id')->on('enquiry_technical_estimates')->references('id');
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
        Schema::dropIfExists('technical_estimate_histories');
    }
}
