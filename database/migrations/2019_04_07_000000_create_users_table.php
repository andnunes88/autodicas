<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            
            $table->integer('estado_id')->unsigned()->nullable();
            $table->foreign('estado_id')->references('id')->on('estados');
            
            $table->integer('cidade_id')->unsigned()->nullable();
            $table->foreign('cidade_id')->references('id')->on('cidades');

            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('admin',['N','S'])->default('N');
            $table->string('telefone')->nullable();
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('complemento')->nullable();
            $table->string('usuario_slug')->nullable();
            $table->string('usuario_imagem')->nullable();
            $table->string('detalhe')->nullable();
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
