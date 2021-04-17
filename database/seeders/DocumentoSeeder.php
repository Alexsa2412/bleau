<?php

namespace Database\Seeders;

use App\Models\Pessoa\PessoaDocumento;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PessoaDocumento::create(
            [
                'numero' => '000889245',
                'orgao_emissor' => 'SSP/MS',
                'tipo_documento' => 'rg',
                'pessoa_id' => 1
            ]
        );
        PessoaDocumento::create(
            [
                'numero' => '97305340120',
                'tipo_documento' => 'cpf',
                'pessoa_id' => 1
            ]
        );
    }
}
