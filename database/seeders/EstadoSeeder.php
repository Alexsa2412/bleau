<?php

namespace Database\Seeders;

use App\Models\Endereco\Estado;
use App\Repositories\Endereco\PaisRepository;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $paisRepository;

    public function run(PaisRepository $paisRepository)
    {
        $this->paisRepository = $paisRepository;
        $pais = $this->paisRepository
            ->where('nome', 'Brasil')
            ->first();
        $pais_id = $pais->id;

        Estado::create(['id' => 11,'nome' => 'RONDÔNIA', 'sigla' => 'RO', 'pais_id' => $pais_id]);
		Estado::create(['id' => 12,'nome' => 'ACRE', 'sigla' => 'AC', 'pais_id' => $pais_id]);
		Estado::create(['id' => 13,'nome' => 'AMAZONAS', 'sigla' => 'AM', 'pais_id' => $pais_id]);
		Estado::create(['id' => 14,'nome' => 'RORAIMA', 'sigla' => 'RR', 'pais_id' => $pais_id]);
		Estado::create(['id' => 15,'nome' => 'PARÁ', 'sigla' => 'PA', 'pais_id' => $pais_id]);
		Estado::create(['id' => 16,'nome' => 'AMAPÁ', 'sigla' => 'AP', 'pais_id' => $pais_id]);
		Estado::create(['id' => 17,'nome' => 'TOCANTINS', 'sigla' => 'TO', 'pais_id' => $pais_id]);
		Estado::create(['id' => 21,'nome' => 'MARANHÃO', 'sigla' => 'MA', 'pais_id' => $pais_id]);
		Estado::create(['id' => 22,'nome' => 'PIAUÍ', 'sigla' => 'PI', 'pais_id' => $pais_id]);
		Estado::create(['id' => 23,'nome' => 'CEARÁ', 'sigla' => 'CE', 'pais_id' => $pais_id]);
		Estado::create(['id' => 24,'nome' => 'RIO GRANDE DO NORTE', 'sigla' => 'RN', 'pais_id' => $pais_id]);
		Estado::create(['id' => 25,'nome' => 'PARAIBA', 'sigla' => 'PB', 'pais_id' => $pais_id]);
		Estado::create(['id' => 26,'nome' => 'PERNAMBUCO', 'sigla' => 'PE', 'pais_id' => $pais_id]);
		Estado::create(['id' => 27,'nome' => 'ALAGOAS', 'sigla' => 'AL', 'pais_id' => $pais_id]);
		Estado::create(['id' => 28,'nome' => 'SERGIPE', 'sigla' => 'SE', 'pais_id' => $pais_id]);
		Estado::create(['id' => 29,'nome' => 'BAHIA', 'sigla' => 'BA', 'pais_id' => $pais_id]);
		Estado::create(['id' => 31,'nome' => 'MINAS GERAIS', 'sigla' => 'MG', 'pais_id' => $pais_id]);
		Estado::create(['id' => 32,'nome' => 'ESPÍRITO SANTO', 'sigla' => 'ES', 'pais_id' => $pais_id]);
		Estado::create(['id' => 33,'nome' => 'RIO DE JANEIRO', 'sigla' => 'RJ', 'pais_id' => $pais_id]);
		Estado::create(['id' => 35,'nome' => 'SÃO PAULO', 'sigla' => 'SP', 'pais_id' => $pais_id]);
		Estado::create(['id' => 41,'nome' => 'PARANÁ', 'sigla' => 'PR', 'pais_id' => $pais_id]);
		Estado::create(['id' => 42,'nome' => 'SANTA CATARINA', 'sigla' => 'SC', 'pais_id' => $pais_id]);
		Estado::create(['id' => 43,'nome' => 'RIO GRANDE DO SUL', 'sigla' => 'RS', 'pais_id' => $pais_id]);
		Estado::create(['id' => 50,'nome' => 'MATO GROSSO DO SUL', 'sigla' => 'MS', 'pais_id' => $pais_id]);
		Estado::create(['id' => 51,'nome' => 'MATO GROSSO', 'sigla' => 'MT', 'pais_id' => $pais_id]);
		Estado::create(['id' => 52,'nome' => 'GOIÁS', 'sigla' => 'GO', 'pais_id' => $pais_id]);
		Estado::create(['id' => 53,'nome' => 'DISTRITO FEDERAL', 'sigla' => 'DF', 'pais_id' => $pais_id]);
    }
}
