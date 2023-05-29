<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('issue_id');
            $table->unsignedBigInteger('project_id');
            $table->string('status')->default('NEW');
            $table->longText('remarks')->nullable();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('type');
            $table->integer('request_id');
            $table->string('request_name');
            $table->integer('assignee_id');
            $table->string('assignee_name');
            $table->string('assignee_role')->nullable();
            $table->string('requester_role')->nullable();
            $table->string('priority');
            $table->date('due_date');
            $table->json('tags');
            $table->boolean('convert_variation_order')->default(false);
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('issues');
    }
}
