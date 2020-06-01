<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_materi')->nullable();
            $table->string('deskripsi')->nullable();
            $table->text('fill_deskripsi')->nullable();
            $table->string('qr')->nullable();
            $table->integer('status')
                ->length(1)
                ->default(1)
                ->comment('0=nonaktif;1=aktif');
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
        Schema::dropIfExists('materis');
    }
}
