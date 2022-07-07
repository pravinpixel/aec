<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWizardStatusColumnToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->json('wizard_status')->default(json_encode(["create_project" => 0,"team_setup"=> 0,"invoice_plan"=> 0,"connect_platform"=> 0,"todo_list"=> 0,"project_scheduler"=>0]));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('wizard_status');
        });
    }
}
