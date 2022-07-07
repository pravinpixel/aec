<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_ticket_id')->nullable();
            $table->string("type")->nullable();
            $table->text('comments')->nullable();
            $table->text('file_id')->nullable();
            $table->boolean('status')->default(0);
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('send_by')->nullable();
            $table->unsignedBigInteger('seen_by')->nullable();
            $table->string('role_by')->nullable();
            $table->foreign('project_ticket_id')->references('id')->on('project_tickets');
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
        Schema::dropIfExists('ticket_comments');
    }
}
