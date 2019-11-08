<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_survey', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('question');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('question_choice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('choice');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('question_survey')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('user_response', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_choice')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('question_choice')->references('id')->on('question_choice')->onDelete('cascade');
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
        Schema::dropIfExists('question_survey');
        Schema::dropIfExists('question_choice');
        Schema::dropIfExists('user_response');
    }
}
