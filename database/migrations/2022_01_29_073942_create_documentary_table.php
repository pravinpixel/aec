<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentary', function (Blueprint $table) {
          
                $table->id();
                $table->string('documentary_title')->nullable(1);
                $table->string('documentary_type')->nullable(1);
                $table->string('documentary_content')->nullable(1);
                $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('documentary');
    }
}