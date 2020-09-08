<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_projeto')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type', ['Professor','Estudante']);
            $table->enum('course', ['Administração','Arquitetura e urbanismo','Biomedicina','Direito'
                ,'Educação Fisica','Engenharia','Enfermagem','Engenharia Mecatrônica','Farmácia','Fisioterapia','Gastronomia'
                ,'Medicína Veterinária','Sistemas de Informação','Nutrição','Odontologia','Psicologia','Publicidade e Propaganda'
                ]);
            $table->enum('matter', ['TID','TCC','Projeto de Pesquisa','Portugues','Matematica']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
