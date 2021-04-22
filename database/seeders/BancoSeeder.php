<?php

namespace Database\Seeders;

use App\Models\Banco\Banco;
use Illuminate\Database\Seeder;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //no pais_id nesse instante coloca 1 para todos os paises por favor
        //crie uma linha dessa para cada banco que quiser efetuar o cadastro prévio =)
        Banco::create(['nome' => 'Banco do Brasil', 'codigo' => '001', 'pais_id' => 1]);
    }
}
