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
            $table->string('full_name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('domains')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('job_title')->nullable();
            $table->unsignedBigInteger('job_role')->nullable();
            $table->string('department')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('country_code')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->string('password')->nullable();
            $table->string('share_point_status')->nullable();
            $table->text('share_point_folders')->nullable();
            $table->boolean('sign_in_password_change')->default(0);
            $table->boolean('send_password_to_email')->default(0);
            $table->string('recipient_email')->nullable();
            $table->string('bim_access')->nullable();
            $table->string('bim_id')->nullable();
            $table->string('bim_account_id')->nullable();
            $table->string('bim_uid')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->integer('completed_wizard')->default(0);
            $table->softDeletes('deleted_at');
            $table->string('token')->nullable(); 
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
