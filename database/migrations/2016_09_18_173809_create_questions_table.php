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
<<<<<<< HEAD:database/migrations/2016_09_18_173811_create_questions_table.php
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->default(0);
=======
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->
                references('id')->
                on('categories')->
                onDelete('cascade');
>>>>>>> d948daa0971955a0dee6d2552e30b211455f8f12:database/migrations/2016_09_18_173809_create_questions_table.php
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
