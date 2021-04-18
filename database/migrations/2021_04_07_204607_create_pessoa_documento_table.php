<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_documento', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 20);
            $table->string('orgao_emissor', 30)->nullable(true);
            $table->date('data_de_emissao')->nullable(true);
            $table->enum('tipo_documento', ['rg','passaporte','cpf','cis']);
            $table->foreignId('estado_id')->nullable(true);
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
        Schema::dropIfExists('pessoa_documento');
    }
}
