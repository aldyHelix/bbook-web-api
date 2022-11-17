<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablePetunjuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petunjuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_petunjuk')->nullable();
            $table->string('nama_petunjuk')->nullable();
            $table->text('header')->nullable();
            $table->text('description')->nullable();
            $table->integer('order');
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
        Schema::dropIfExists('petunjuk');
    }
}
