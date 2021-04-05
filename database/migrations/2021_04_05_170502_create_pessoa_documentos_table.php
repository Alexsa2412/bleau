<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('rg', 15)->nullable(true);
            $table->string('orgao_emissor', 10)->nullable(true);
            $table->string('uf_orgao_emissor', 3)->nullable(true);
            $table->foreignId('pessoa_id')->constrained('pessoas');
            $table->foreignId('pais_id')->constrained('pais');
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
        Schema::dropIfExists('pessoa_documentos');
    }
}
