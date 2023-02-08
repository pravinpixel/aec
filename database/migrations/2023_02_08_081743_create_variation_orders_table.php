<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variation_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('issue_id');
            $table->integer('project_id');
            $table->string('title');
            $table->string('hours');
            $table->string('price');
            $table->longText('description');
            $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
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
        Schema::dropIfExists('variation_orders');
    }
}
