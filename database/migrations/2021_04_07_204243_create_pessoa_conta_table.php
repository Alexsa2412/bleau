<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaContaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_conta', function (Blueprint $table) {
            $table->id();
            $table->string('agencia', 10);
            $table->string('numero', 20);
            $table->string('operacao', 12)->nullable(true);
            $table->enum('tipo', ['corrente','poupanca'])->default('corrente');
            $table->string('pix', 20)->nullable(true);
            $table->foreignId('banco_id')->constrained('Banco')->nullable(true);
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
        Schema::dropIfExists('pessoa_conta');
    }
}
