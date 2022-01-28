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
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('enquiry_id')->unsigned(); 
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
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
