<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryBuildingComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * for walls
     */
    public function up()
    { 
        Schema::create('enquiry_building_components', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiry_id')->unsigned();
            $table->unsignedBigInteger('building_component_id')->unsigned();
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->foreign('building_component_id')->references('id')->on('building_components');
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
        Schema::dropIfExists('enquiry_building_components');
    }
}
