<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('enquiry_date')->nullable();
            $table->string('enquiry_number')->nullable();
            $table->string('customer_enquiry_number')->nullable();
            $table->string('company_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('secondary_mobile_no')->nullable();
            $table->string('organization_number')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('building_type_id')->nullable();
            $table->unsignedBigInteger('delivery_type_id')->nullable();
            $table->unsignedBigInteger('project_type_id')->nullable();
            $table->string('project_name')->nullable();
            $table->datetime('project_date')->nullable();
            $table->string('place')->nullable();
            $table->string('site_address')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('state')->nullable();
            $table->integer('no_of_building')->nullable();
            $table->datetime('project_delivery_date')->nullable();
            $table->boolean('building_component_process_type')->default(0);
            $table->boolean('project_info')->default(0);
            $table->boolean('service')->default(0);
            $table->boolean('ifc_model_upload')->default(0);
            $table->boolean('building_component')->default(0);
            $table->boolean('additional_info')->default(0);
            $table->string('initiate_from')->nullable();
            $table->boolean('is_active')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers'); 
            $table->string('status')->default('In-Complete');
            $table->string('project_status')->default('Unattended');
            // ======== Admin Wizard Flow Status =======
                $table->boolean('technical_estimation_status')->default(0);
                $table->boolean('cost_estimation_status')->default(0);
                $table->boolean('proposal_sharing_status')->default(0);
                $table->integer('customer_response')->nullable();
            // ======== Admin Wizard Flow Status =======
            $table->unsignedBigInteger('from_enquiry_id')->nullable();
            $table->boolean('is_new_enquiry')->default(1);
            $table->string('device_token')->nullable();
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
        Schema::dropIfExists('enquiries');
    }
}
