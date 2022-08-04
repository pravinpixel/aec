<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectAssignToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_assign_to_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiry_id');
            $table->unsignedBigInteger('assign_by');
            $table->unsignedBigInteger('assign_to');
            $table->foreign('enquiry_id')->references('id')->on('enquiries');
            $table->foreign('assign_by')->references('id')->on('employees');
            $table->foreign('assign_to')->references('id')->on('employees');
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
        Schema::dropIfExists('project_assign_to_users');
    }
}
