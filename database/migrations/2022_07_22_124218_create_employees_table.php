<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('domains')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('job_title')->nullable();
            $table->string('department')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('password')->nullable();
            $table->string('share_point_status')->nullable();
            $table->text('share_point_folders')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
