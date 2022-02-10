<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropoalVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propoal_versions', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->integer('proposal_id');
            $table->integer('enquiry_id');
            $table->integer('documentary_id');
            $table->timestamp('documentary_date');
            $table->longText('documentary_content')->nullable();
            $table->string('pdf_file_name')->nullable();
            $table->longText('is_mail_sent')->default(0);
            $table->string('status')->default('awaiting');
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
        Schema::dropIfExists('propoal_versions');
    }
}