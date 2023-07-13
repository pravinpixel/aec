<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveProjectInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_project_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('project_id');
            $table->integer('order_id');
            $table->integer('customer_24_id');
            $table->string('order_status');
            $table->integer('invoice_id');
            $table->string('date_invoiced');
            $table->string('price');
            $table->string('name');
            $table->string('quantity');
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
        Schema::dropIfExists('live_project_invoices');
    }
}
