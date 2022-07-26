<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryBuildingComponentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_bcds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiry_id')->unsigned();
            $table->unsignedBigInteger('enquiry_building_component_id')->unsigned();
            $table->unsignedBigInteger('building_component_delivery_type_id')->unsigned();
            $table->string('floor');
            $table->string('exd_wall_number')->nullable();
            $table->decimal('approx_total_area')->default(0);
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->foreign('enquiry_building_component_id')->references('id')->on('enquiry_building_components');
            $table->foreign('building_component_delivery_type_id')->references('id')->on('delivery_types');
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
        Schema::dropIfExists('enquiry_bcds');
    }
}
