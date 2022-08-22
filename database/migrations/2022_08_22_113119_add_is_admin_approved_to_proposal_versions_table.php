<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsAdminApprovedToProposalVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propoal_versions', function (Blueprint $table) {
            $table->boolean('is_admin_approved')->default(0);
            $table->boolean('approved_admin_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propoal_versions', function (Blueprint $table) {
            $table->dropColumn('is_admin_approved');
            $table->dropColumn('approved_admin_id');
        });
    }
}
