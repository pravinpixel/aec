<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->id();
            $table->string('sender_role');
            $table->integer('sender_id');
            $table->string('receiver_role');
            $table->integer('receiver_id');
            $table->string('module_name');
            $table->integer('module_id');
            $table->string('menu_name');
            $table->text('message');
            $table->boolean('read_status')->default(false); 
            $table->string('send_date'); 
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
        Schema::dropIfExists('inboxes');
    }
}
