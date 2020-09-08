<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_author');
            $table->string('vinculo_user_name')->comment('vinculo entre post e adote do projeto')->nullable();
            $table->integer('vinculo_user_id')->comment('vinculo entre post e adote do projeto')->nullable();
            $table->string('title');
            $table->text('body');
            $table->string('author');
            $table->foreign('author')->references('id')->on('users');
            $table->integer('rate')->nullable()->default(0);
            $table->integer('available')->nullable()->default(1);
            $table->enum('collegiate', ['Administração','Arquitetura e urbanismo','Biomedicina','Direito'
            ,'Educação Fisica','Engenharia','Enfermagem','Engenharia Mecatrônica','Farmácia','Fisioterapia','Gastronomia'
            ,'Medicína Veterinária','Sistemas de Informação','Nutrição','Odontologia','Psicologia','Publicidade e Propaganda'
            ,'Exatas','Saúde','Todos']);

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
        Schema::dropIfExists('posts');
    }
}
