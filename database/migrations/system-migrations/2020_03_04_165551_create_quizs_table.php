<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_id');
            $table->string('question')->nullable();
            $table->integer('is_picture_quiz')
                ->length(1)
                ->default(1)
                ->comment('0=false;1=true');
            $table->text('answer')->comment('key word only or option')->nullable();
            $table->timestamps();

            $table->foreign('materi_id')
            ->references('id')->on('materis')
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
        Schema::dropIfExists('quizs');
    }
}
