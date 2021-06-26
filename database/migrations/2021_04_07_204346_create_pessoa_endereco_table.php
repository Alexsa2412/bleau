<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_endereco', function (Blueprint $table) {
            $table->id();
            $table->string('logradouro', 120);
            $table->string('numero', 10)->nullable(true);
            $table->string('complemento', 120)->nullable(true);
            $table->string('bairro', 120)->nullable(true);
            $table->string('cep', 15)->nullable(true);
            $table->string('cidade_exterior', 255)->nullable(true);
            $table->string('estado_exterior', 5)->nullable(true);
            $table->foreignId('pais_id')->nullable(true)->constrained('pais');
            $table->foreignId('cidade_id')->nullable(true)->constrained('cidade');
            $table->foreignId('pessoa_id')->constrained('pessoa');
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
        Schema::dropIfExists('pessoa_endereco', function(Blueprint $table){
            $table->dropConstrainedForeignId('pessoa_id');
            $table->dropConstrainedForeignId('cidade_id');
            $table->dropConstrainedForeignId('pais_id');
        });
    }
}
