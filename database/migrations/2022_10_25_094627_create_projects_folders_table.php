<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_folders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pid');
            $table->unsignedBigInteger('fid');
            $table->foreign('pid')->references('id')->on('projects');
            $table->foreign('fid')->references('id')->on('share_point_master_folders');
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
        Schema::dropIfExists('projects_folders');
    }
}
