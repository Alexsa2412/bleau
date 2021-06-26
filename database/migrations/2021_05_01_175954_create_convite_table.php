<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConviteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convite', function (Blueprint $table) {
            $table->id();
            $table->string('email_do_convidado', 255);
            $table->string('nome_do_convidado', 255);
            $table->string('codigo_do_convite', 32);
            $table->foreignId('pessoa_id')->constrained('pessoa', 'id');
            $table->enum('utilizado', ['nao','sim'])->default('nao');
            $table->date('data_de_uso')->nullable(true);
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
        Schema::dropIfExists('convite', function(Blueprint $table) {
            $table->dropConstrainedForeignId('pessoa_id');
        });
    }
}
