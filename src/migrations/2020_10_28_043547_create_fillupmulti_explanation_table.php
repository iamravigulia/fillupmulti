<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFillupmultiExplanationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fmt_fillupmulti_explanation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->longText('reviews')->nullable();
            $table->longText('solve')->nullable();
            $table->foreignId('media_id')->nullable();
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('fmt_fillupmulti_explanation');
    }
}
