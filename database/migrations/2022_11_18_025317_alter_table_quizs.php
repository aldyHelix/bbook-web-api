<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableQuizs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('quizs');

        Schema::create('quizs', function (Blueprint $table) {
            $table->id();
            $table->string('header')->nullable();
            $table->string('question')->nullable();
            $table->integer('is_picture_quiz')
                ->length(1)
                ->default(1)
                ->comment('0=false;1=true');
            $table->string('image')->nullable();
            $table->integer('answer_index');
            $table->integer('order');
            $table->integer('bab');
            $table->integer('status')
                    ->length(1)
                    ->default(1)
                    ->comment('0=nonaktif;1=aktif');
            $table->text('option_a')->nullable();
            $table->text('option_b')->nullable();
            $table->text('option_c')->nullable();
            $table->text('option_d')->nullable();
            $table->text('option_e')->nullable();
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
        Schema::dropIfExists('quizs');

        Schema::create('quizs', function (Blueprint $table) {
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
}
