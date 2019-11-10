<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Opinion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('survey', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('question');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('choice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('choice');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('survey')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('response', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_choice')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('answer');
            $table->foreign('question_choice')->references('id')->on('choice')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        //
        Schema::dropIfExists('survey');
        Schema::dropIfExists('choice');
        Schema::dropIfExists('response');
    }
}


