<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryBuildingComponentLayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_building_component_layers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiry_id')->unsigned();
            $table->unsignedBigInteger('enquiry_bcd_id')->unsigned();
            $table->unsignedBigInteger('layer_id')->unsigned();
            $table->unsignedBigInteger('layer_type_id')->unsigned();
            $table->string('thickness');
            $table->string('breath');
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->foreign('enquiry_bcd_id')->references('id')->on('enquiry_bcds');
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
        Schema::dropIfExists('enquiry_building_component_layers');
    }
}
