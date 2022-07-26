<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('enquiry_prefix');
            $table->string('enquiry_year');
            $table->integer('enquiry_number');
            $table->string('customer_prefix');
            $table->string('project_prefix');
            $table->string('project_number');
            $table->integer('customer_enquiry_year');
            $table->integer('customer_enquiry_number');
            $table->string('employee_prefix')->nullable();
            $table->string('employee_number')->nullable();
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
        Schema::dropIfExists('configs');
    }
}
