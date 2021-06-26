<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->id();
            $table->string('email', 255)->unique('unq_pessoa_email');
            $table->date('data_de_nascimento')->nullable(true);
            $table->string('nome', 255);
            $table->string('profissao', 60)->nullable(true);
            $table->enum('estado_civil', ['solteiro','casado','separado','divorciado','viuvo','uniao_estavel'])->nullable(true);
            $table->enum('situacao', ['ativo','inativo'])->default('ativo');
            $table->enum('aportado', ['sim','nao'])->default('nao');
            $table->string('password')->nullable(true);
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
        Schema::dropIfExists('pessoa', function(Blueprint $table){
            $table->dropUnique('unq_pessoa_email');
        });
    }
}
