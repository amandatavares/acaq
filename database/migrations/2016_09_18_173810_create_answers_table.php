<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->default(0);
            $table->integer('question_id')->unsigned();
			$table->foreign('question_id')->
			    references('id')->
			    on('questions')->
			    onDelete('cascade');
            $table->string('description');
            $table->string('img_path')->nullable();
            $table->integer('n_like')->default(0);
            $table->integer('n_dislike')->default(0);
            $table->integer('n_complaint')->default(0);
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
		Schema::drop('answers');
	}

}
