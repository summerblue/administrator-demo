<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration 
{
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('body');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('posts');
	}
}
