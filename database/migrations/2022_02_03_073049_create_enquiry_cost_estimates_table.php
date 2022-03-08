<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryCostEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_cost_estimates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assign_to')->nullable();
            $table->unsignedBigInteger('assign_by')->nullable();
            $table->string('enquiry_id'); 
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->text('build_json')->nullable();
            $table->string('total_cost')->nullable();
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
        Schema::dropIfExists('enquiry_cost_estimates');
    }
}
