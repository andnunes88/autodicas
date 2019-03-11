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
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('admin',['N','S'])->default('N');
            $table->string('telefone')->nullable();
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('cep')->nullable();
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();
            $table->string('endereco')->nullable();
            $table->string('usuario_slug')->nullable();
            $table->string('usuario_imagem')->nullable();
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
