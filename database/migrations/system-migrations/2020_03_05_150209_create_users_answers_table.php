<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_id');
            $table->foreignId('quiz_id');
            $table->foreignId('quiz_option_id');
            $table->foreignId('user_id');

            $table->foreign('materi_id')
            ->references('id')->on('materis')
            ->onDelete('cascade');

            $table->foreign('quiz_id')
            ->references('id')->on('quiz')
            ->onDelete('cascade');

            $table->foreign('quiz_option_id')
            ->references('id')->on('quiz_options')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')->on('end_users')
            ->onDelete('cascade');

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
        Schema::dropIfExists('users_answers');
    }
}
