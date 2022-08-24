<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleIdToCostEstimateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cost_estimate_histories', function (Blueprint $table) {
            $table->integer('role_id')->nullable();
        });
        Schema::table('technical_estimate_histories', function (Blueprint $table) {
            $table->integer('role_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cost_estimate_histories', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });
        
        Schema::table('technical_estimate_histories', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });
    }
}
