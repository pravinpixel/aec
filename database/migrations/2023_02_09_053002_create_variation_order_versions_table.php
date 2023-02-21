<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationOrderVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variation_order_versions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variation_id');
            $table->string('version');
            $table->integer('project_id');
            $table->string('title');
            $table->string('hours');
            $table->string('price');
            $table->string('status')->default('NEW');
            $table->longText('description');
            $table->longText('comments')->default(null);
            $table->foreign('variation_id')->references('id')->on('variation_orders')->onDelete('cascade');
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
        Schema::dropIfExists('variation_order_versions');
    }
}
