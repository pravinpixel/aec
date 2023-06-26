<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxesTable extends Migration
{
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
            $table->string('send_date'); 
            $table->boolean('receiver_status')->default(false);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('inboxes');
    }
}
