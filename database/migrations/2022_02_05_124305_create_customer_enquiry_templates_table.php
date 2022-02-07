<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerEnquiryTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_enquiry_templates', function (Blueprint $table) {
            $table->id();
            $table->string('template_name');
            $table->unsignedBigInteger('building_component_id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('building_component_id')->references('id')->on('building_components');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->json('template');
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
        Schema::dropIfExists('customer_enquiry_templates');
    }
}
