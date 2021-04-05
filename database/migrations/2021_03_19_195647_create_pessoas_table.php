<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 11);
            $table->string('nome', 255);
            $table->string('email', 255);
            $table->string('senha', 255)->nullable(true);
            $table->string('foto')->nullable(true);
            $table->date('data_de_nascimento')->nullable(true);
            $table->string('nacionalidade', 100)->nullable(true);
            $table->string('profissao', 100)->nullable(true);
            $table->enum('situacao', ['ativo','inativo','pendente'])->default('pendente');
            $table->enum('aportado', ['sim','nao'])->default('nao');
            $table->enum('tipo_usuario', ['usuario','administrador'])->default('usuario');
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
        Schema::dropIfExists('pessoas');
    }
}
