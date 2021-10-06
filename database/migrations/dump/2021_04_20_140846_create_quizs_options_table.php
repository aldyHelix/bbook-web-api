<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizs_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id');
            $table->string('option')->comment('alphabet')->nullable();
            $table->text('description_option')->nullable();
            $table->integer('is_answer')
                ->length(1)
                ->default(1)
                ->comment('0=false;1=true');
            $table->timestamps();

            $table->foreign('quiz_id')
            ->references('id')->on('quizs')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizs_options');
    }
}
