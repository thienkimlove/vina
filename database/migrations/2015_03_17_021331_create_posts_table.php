<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('desc');
            $table->text('content');
            $table->string('avatar');
            $table->boolean('homepage')->default(false);
            $table->boolean('feature')->default(false);
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->boolean('status')->default(true);
			$table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
