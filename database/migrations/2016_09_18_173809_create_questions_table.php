<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->default(0);
            //$table->integer('categories_id')->unsigned();
            //$table->foreign('categories_id')->
            //    references('id')->
           //     on('categories')->
           //     onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('img_path')->nullable();
            $table->integer('n_follower')->default(0);
            $table->integer('n_favorite')->default(0);
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
        Schema::dropIfExists('questions');
    }
}
