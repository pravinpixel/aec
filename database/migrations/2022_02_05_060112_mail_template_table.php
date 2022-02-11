<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MailTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_proposal', function (Blueprint $table) {
          
            $table->increments('proposal_id');
            $table->string('enquirie_id')->nullable();
            $table->string('documentary_id')->nullable();
            $table->string('template_name')->nullable();
            $table->longText('documentary_content')->nullable();
            $table->timestamp('documentary_date')->useCurrent();
            $table->timestamp('mail_send_date')->nullable();
            $table->string('pdf_file_name')->nullable();
            $table->string('version')->default('R1');
            $table->string('reference_no')->default(0);
            $table->string('is_mail_sent')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('status')->default('awaiting');
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
        //
    }
}
