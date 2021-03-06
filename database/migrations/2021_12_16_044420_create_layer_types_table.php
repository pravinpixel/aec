<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayerTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layer_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('building_component_id')->nullable();
            $table->unsignedBigInteger('layer_id')->nullable();
            $table->string('layer_type_name');
            $table->boolean('is_active')->default(1);
            $table->foreign('layer_id')->references('id')->on('layers');
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
        Schema::dropIfExists('layer_types');
    }
}
