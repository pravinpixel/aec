<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_module_id');
            $table->string('menu_name');
            $table->string('route_name');
            $table->string('parent_name')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('is_active')->default(1);
            $table->integer('order_id');
            $table->foreign('menu_module_id')->references('id')->on('menu_modules');
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
        Schema::dropIfExists('menus');
    }
}
