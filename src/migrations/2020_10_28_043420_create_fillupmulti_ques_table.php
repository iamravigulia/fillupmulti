<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFillupmultiQuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fmt_fillupmulti_ques', function (Blueprint $table) {
            $table->id();
            $table->longText('question_title')->nullable();
            $table->longText('description')->nullable();
            $table->foreignId('question_format_id')->nullable();
            $table->foreignId('question_sub_format_id')->nullable();
            $table->foreignId('subject_id')->nullable();
            $table->foreignId('topic_id')->nullable();
            $table->foreignId('sub_topic_id')->nullable();
            $table->foreignId('question_level_id')->nullable();
            $table->foreignId('media_id')->nullable();
            $table->boolean('active')->default(1);
            $table->string('hint')->nullable();
            $table->foreignId('level_id')->default(1);
            $table->integer('score')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fmt_fillupmulti_ques');
    }
}
