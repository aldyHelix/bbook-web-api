<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materis_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_id');
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();

            $table->foreign('materi_id')
                ->references('id')->on('materis')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materis_galleries');
    }
}
