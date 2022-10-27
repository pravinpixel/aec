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
            $table->unsignedBigInteger('customer_id')->nullable();
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
            $table->string('city')->nullable();
            $table->integer('no_of_building')->nullable();
            $table->integer('total_cost')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('delivery_date')->nullable();
            $table->string('status')->default('In-Progress');
            $table->string('address_one')->nullable();
            $table->string('address_two')->nullable();
            $table->string('time_zone')->default('Europe/Amsterdam');
            $table->string('language')->default('en');
            $table->boolean('linked_to_customer')->default(0);
            $table->boolean('is_submitted')->default(0); //draft
            $table->boolean('wizard_create_project')->default(0); 
            $table->boolean('wizard_connect_platform')->default(0); 
            $table->boolean('wizard_teamsetup')->default(0);  
            $table->boolean('wizard_invoice_plan')->default(0); 
            $table->boolean('wizard_todo_list')->default(0); 
            $table->boolean('wizard_project_scheduling')->default(0); 
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('project_type_id')->references('id')->on('project_types');
            $table->foreign('building_type_id')->references('id')->on('building_types');
            $table->foreign('delivery_type_id')->references('id')->on('delivery_types');
            $table->foreign('created_by')->references('id')->on('employees');
            $table->foreign('updated_by')->references('id')->on('employees');
            $table->longText('gantt_chart_data')->nullable();
            $table->string('bim_project_type')->default('Residential');
            $table->string('bim_account_id')->nullable();
            $table->string('bim_id')->nullable();
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
