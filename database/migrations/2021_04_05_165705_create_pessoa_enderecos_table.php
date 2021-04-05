<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('logradouro', 120);
            $table->string('numero', 6)->nullable(true);
            $table->string('complemento', 120)->nullable(true);
            $table->string('bairro', 120);
            $table->string('cidade', 80);
            $table->string('estado', 20);
            $table->string('cep', 12);
            $table->string('pais', 30);
            $table->enum('situacao', ['A','I'])->default('A');
            $table->foreignId('pessoa_id')->constrained('pessoas');
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
        Schema::dropIfExists('pessoa_enderecos');
    }
}
