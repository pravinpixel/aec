<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('title')->nullable(); 
            $table->longText('description')->default(0);
            $table->longText('response')->default(0);
            $table->date('change_date');
            $table->string('project_hrs')->nullable();
            $table->string('project_price')->nullable();
            $table->string('total_price')->nullable();
            $table->boolean('status')->default(0);
            $table->longText('is_mail_sent')->default(0);
            $table->boolean('is_active')->default(1);
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('project_tickets');
    }
}
