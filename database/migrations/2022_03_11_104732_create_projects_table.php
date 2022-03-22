<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiry_id')->nullable();
            $table->unsignedBigInteger('building_type_id');
            $table->unsignedBigInteger('project_type_id');
            $table->unsignedBigInteger('delivery_type_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('reference_number');
            $table->string('project_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('site_address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->integer('no_of_building')->nullable();
            $table->date('start_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('status')->default('In-Progress');
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->foreign('project_type_id')->references('id')->on('project_types');
            $table->foreign('building_type_id')->references('id')->on('building_types');
            $table->foreign('delivery_type_id')->references('id')->on('delivery_types');
            $table->foreign('created_by')->references('id')->on('employee');
            $table->foreign('updated_by')->references('id')->on('employee');
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
        Schema::dropIfExists('projects');
    }
}
