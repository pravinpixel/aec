<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryTechnicalEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_technical_estimates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assign_to')->nullable();
            $table->unsignedBigInteger('assign_by')->nullable();
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('enquiry_id')->unsigned(); 
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->foreign('assign_to')->references('id')->on('employee');
            $table->foreign('assign_by')->references('id')->on('employee');
            $table->integer('total_wall_area')->default(0);
            $table->string('wall')->nullable(); 
            $table->text('build_json')->nullable(); 
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
        Schema::dropIfExists('enquiry_technical_estimates');
    }
}
