<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('username', 30)->unique();
                $table->string('email')->unique();
                $table->string('password', 60);
                $table->string('full_name');
                $table->string('avatar')->nullable();
                $table->integer('group_id')->default(0);
                $table->smallInteger('status')->default(USER_STATUS_DEFAULT);
                $table->string('active_token', 100)->nullable();
                $table->rememberToken();
                $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}
