<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('email', 250)->nullable(false);
            $table->string('foto')->nullable(true);
            $table->string('nome', 160)->nullable(false);
            $table->date('data_nasc')->nullable(true);
            $table->string('nacionalidade', 100)->nullable(true);
            $table->string('profissao', 60)->nullable(true);
            $table->string('fone1', 22)->nullable(true);
            $table->string('fone2', 22)->nullable(true);
            $table->string('CPF', 11)->nullable(true)->unique(true);
            $table->string('RG_NUM', 15)->nullable(true);
            $table->string('org_emiss', 10)->nullable(true);
            $table->string('uf_org', 3)->nullable(true);
            $table->string('passaporte', 15)->nullable(true);
            $table->string('logradouro', 120)->nullable(true);
            $table->string('numero', 6)->nullable(true);
            $table->string('complemento', 120)->nullable(true);
            $table->string('bairro', 120)->nullable(true);
            $table->string('cidade', 80)->nullable(true);
            $table->string('estado', 20)->nullable(true);
            $table->string('CEP', 12)->nullable(true);
            $table->string('pais', 30)->nullable(true);
            $table->string('banco', 120)->nullable(true);
            $table->string('agencia', 10)->nullable(true);
            $table->string('conta_corrente', 20)->nullable(true);
            $table->string('tipo_operacao', 12)->nullable(true);
            $table->enum('tipo_conta', ['Conta Corrente','Poupanca'])->default('Conta Corrente')->nullable(true);
            $table->string('pix', 250)->nullable(true);
            $table->enum('situacao', ['A','I'])->default('A')->nullable(true);
            $table->enum('aportado', ['S','N'])->default('N')->nullable(true);
            $table->timestamps();

            //campos externos

            
            
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
