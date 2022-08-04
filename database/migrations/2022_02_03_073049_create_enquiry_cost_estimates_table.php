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
            $table->string('assign_for')->nullable();
            $table->boolean('assign_for_status')->default(0);
            $table->string('enquiry_id'); 
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->longText('build_json')->nullable();
            $table->longText('precast_build_json')->nullable();
            $table->string('total_cost')->nullable();
            $table->foreign('assign_to')->references('id')->on('employees');
            $table->foreign('assign_by')->references('id')->on('employees');
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
