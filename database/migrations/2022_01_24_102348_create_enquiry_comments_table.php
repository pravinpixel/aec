<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_comments', function (Blueprint $table) {
            $table->id();
            $table->integer("enquiry_id");
            $table->string("type")->nullable();
            $table->text('comments')->nullable();
            $table->text('file_id')->nullable();
            $table->boolean('status')->default(0);
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('enquiry_comments');
    }
}
