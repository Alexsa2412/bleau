<?php

namespace Database\Seeders;

use App\Models\Endereco\Pais;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::create(['nome' => 'Brasil', 'nacionalidade' => 'brasileiro', 'codigo_de_area' => '55']);
    }
}
