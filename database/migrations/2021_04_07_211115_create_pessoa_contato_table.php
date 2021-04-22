<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaContatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 20);
            $table->enum('tipo_contato', ['residencial','comercial','movel']);
            $table->enum('whatsapp', ['sim','nao'])->default('nao');
            $table->foreignId('pessoa_id')->constrained('pessoa');
            $table->foreignId('pais_id')->nullable(true)->constrained('pais');
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
        Schema::dropIfExists('contato');
    }
}
