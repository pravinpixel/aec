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
            $table->unsignedBigInteger('ticket_comment_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('title')->nullable(); 
            $table->longText('description')->nullable();
            $table->longText('response')->nullable();
            $table->date('change_date');
            $table->string('project_hrs')->nullable();
            $table->string('project_price')->nullable();
            $table->string('total_price')->nullable();
            $table->boolean('status')->default(0);
            $table->string('variation_status')->nullable();
            $table->string('action_comment')->nullable();
            $table->integer('variation_email_status')->default(0);;
            $table->longText('is_mail_sent')->nullable();
            $table->integer('is_sent')->default(0);
            $table->integer('customer_response')->default(0);
            $table->boolean('is_active')->default(1);
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('ticket_comment_id')->references('id')->on('ticket_comments');
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
