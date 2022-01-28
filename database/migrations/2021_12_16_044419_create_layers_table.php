<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layers', function (Blueprint $table) {
            $table->id();
            $table->string('layer_name');
            $table->unsignedBigInteger('building_component_id')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('user_type')->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('building_component_id')->references('id')->on('building_components');
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
        Schema::dropIfExists('layers');
    }
}
