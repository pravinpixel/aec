<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTypeEnquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_type_enquiry', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('enquiry_id');
            $table->unsignedBigInteger('document_type_id');
            $table->longText('file_name');
            $table->longText('client_file_name');
            $table->string('file_type');
            $table->string('status');
            $table->boolean('translate_status')->default(0);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('document_type_enquiry');
    }
}
