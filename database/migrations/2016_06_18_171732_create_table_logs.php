<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('logs')){
            Schema::create('logs', function (Blueprint $table){
                $table->bigIncrements('id');
                $table->integer('user_id')->default(0);
                $table->string('title');
                $table->text('content');
                $table->string('ip_address');
                $table->timestamp('created_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
