<?php

namespace Database\Seeders;

use App\Models\Pessoa\PessoaEndereco;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PessoaEndereco::create([
            'logradouro' => 'Avenida Senador Antonio Mendes Canale',
            'numero' => '725',
            'complemento' => 'Bl 11 Apto 308',
            'bairro' => 'Pioneiros',
            'cep' => '79070903',
            'pessoa_id' => 1
        ]);
    }
}
