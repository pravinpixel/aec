<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_proposals', function (Blueprint $table) {
            $table->id();
            $table->integer('enquiry_id');
            $table->text('title')->nullable();
            $table->integer('parent')->nullable();
            $table->string('version')->nullable(); 
            $table->text('comments')->nullable();
            $table->longText('content')->nullable();
            $table->string('admin_status')->nullable();
            $table->string('customer_status')->nullable();
            $table->timestamp('mailed_at')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('enquiry_proposals');
    }
}
