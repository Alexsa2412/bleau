<?php
use App\Models\Pessoas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos', function (Blueprint $table) 
        {
            $table->id();
            $table->enum('anexo', ['RG','CPF', 'ENDEREÇO'])->default('RG');
            $table->string('imagem', 250)->require(false);;
            $table->enum('conferido', ['PENDENTE','CONFERIDO'])->default('PENDENTE');
            $table->date('vencimento')->require(false);;
            $table->timestamps();

             //FK + relacionamento
             $table->foreignId('pessoas_id')->constrained('Pessoas');
        });
    }
 
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {

        Schema::dropForeign('anexos_pessoas_id_foreign');
        Schema::dropIfExists('anexos');           

    }

}
