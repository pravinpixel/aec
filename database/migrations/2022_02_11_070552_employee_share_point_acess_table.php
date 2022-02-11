<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeSharePointAcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_share_point_acess', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
            $table->string('administration_status')->nullable();
            $table->string('business_status')->nullable();
            $table->string('sales_status')->nullable();
            $table->string('projects_status')->nullable();
            $table->string('engineering_status')->nullable();
            $table->string('subsea_projects_status')->nullable();
            $table->boolean('is_active')->default(1);
            $table->softDeletes();
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
        //
    }
}
