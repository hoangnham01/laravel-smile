<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tags')){
            Schema::create('tags', function (Blueprint $table){
                $table->increments('id');
                $table->string('title');
                $table->string('slug');
            });
        }
        if(!Schema::hasTable('tags_items')){
            Schema::create('tags_items', function (Blueprint $table){
                $table->increments('id');
                $table->integer('tag_id');
                $table->integer('item_id');
                $table->string('type', 30)->default(TAG_TYPE_POST);
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
        Schema::dropIfExists('tags');
        Schema::dropIfExists('tags_items');
    }
}
