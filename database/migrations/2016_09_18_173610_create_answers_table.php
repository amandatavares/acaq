<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateanswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function(Blueprint $table) {
            $table->increments('id');
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
