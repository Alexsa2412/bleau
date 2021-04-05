<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_contas', function (Blueprint $table) {
            $table->id();
            $table->string('agencia', 10)->nullable(true);
            $table->string('conta_corrente', 20)->nullable(true);
            $table->string('tipo_operacao', 12)->nullable(true);
            $table->enum('tipo_conta', ['Conta Corrente','Poupanca'])->default('Conta Corrente')->nullable(true);
            $table->string('pix', 250)->nullable(true);
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
        Schema::dropIfExists('pessoa_contas');
    }
}
