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
            
            $table->string("type")->nullable();
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->text('file_id')->nullable();
            $table->text('assigned')->nullable();
            $table->text('priority')->nullable();
            $table->datetime('ticket_date')->nullable();
            $table->boolean('status')->default(0);
            $table->string('project_status')->default(0);
            $table->string('created_by')->nullable();
            $table->string('requester')->nullable();
            $table->string('updated_by')->default(0);
            $table->unsignedBigInteger('send_by')->nullable();
            $table->unsignedBigInteger('seen_by')->nullable();
            $table->string('role_by')->nullable();
            
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
