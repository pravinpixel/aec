<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeBimAccessProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_bim_access_projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('employee_id');
            $table->boolean('access_status')->default(0);
            $table->string('role')->nullable();
            $table->boolean('is_project_admin')->default(0);
            $table->boolean('document_management')->default(0);
            $table->boolean('insight')->default(0);
            $table->boolean('design_collaboration')->default(0);
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('employee_id')->references('id')->on('employees');
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
        Schema::dropIfExists('user_bim_access_projects');
    }
}
