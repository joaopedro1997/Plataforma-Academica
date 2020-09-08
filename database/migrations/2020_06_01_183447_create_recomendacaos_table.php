<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecomendacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recomendacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_professor');
            $table->foreign('id_professor')->references('id')->on('users');
            $table->integer('id_post');
            $table->foreign('id_post')->references('id')->on('posts');
            $table->integer('id_destino');
            $table->foreign('id_destino')->references('id')->on('users');
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
        Schema::dropIfExists('recomendacaos');
    }
}
