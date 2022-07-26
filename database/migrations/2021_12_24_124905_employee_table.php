<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
            $table->string('first_Name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('job_role')->nullable();
            $table->string('number')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->string('share_access')->nullable();
            $table->string('bim_access')->nullable();
            $table->string('bim_id')->nullable();
            $table->string('bim_account_id')->nullable();
            $table->string('bim_uid')->nullable();
            $table->string('access')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('device_token')->nullable();
            $table->integer('notification')->default(0);
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
