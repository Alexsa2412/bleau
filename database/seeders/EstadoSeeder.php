<?php

namespace Database\Seeders;

use App\Models\Endereco\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Estado::create(['id' => 11,'nome' => 'RONDÔNIA', 'sigla' => 'RO']);
		Estado::create(['id' => 12,'nome' => 'ACRE', 'sigla' => 'AC']);
		Estado::create(['id' => 13,'nome' => 'AMAZONAS', 'sigla' => 'AM']);
		Estado::create(['id' => 14,'nome' => 'RORAIMA', 'sigla' => 'RR']);
		Estado::create(['id' => 15,'nome' => 'PARÁ', 'sigla' => 'PA']);
		Estado::create(['id' => 16,'nome' => 'AMAPÁ', 'sigla' => 'AP']);
		Estado::create(['id' => 17,'nome' => 'TOCANTINS', 'sigla' => 'TO']);
		Estado::create(['id' => 21,'nome' => 'MARANHÃO', 'sigla' => 'MA']);
		Estado::create(['id' => 22,'nome' => 'PIAUÍ', 'sigla' => 'PI']);
		Estado::create(['id' => 23,'nome' => 'CEARÁ', 'sigla' => 'CE']);
		Estado::create(['id' => 24,'nome' => 'RIO GRANDE DO NORTE', 'sigla' => 'RN']);
		Estado::create(['id' => 25,'nome' => 'PARAIBA', 'sigla' => 'PB']);
		Estado::create(['id' => 26,'nome' => 'PERNAMBUCO', 'sigla' => 'PE']);
		Estado::create(['id' => 27,'nome' => 'ALAGOAS', 'sigla' => 'AL']);
		Estado::create(['id' => 28,'nome' => 'SERGIPE', 'sigla' => 'SE']);
		Estado::create(['id' => 29,'nome' => 'BAHIA', 'sigla' => 'BA']);
		Estado::create(['id' => 31,'nome' => 'MINAS GERAIS', 'sigla' => 'MG']);
		Estado::create(['id' => 32,'nome' => 'ESPÍRITO SANTO', 'sigla' => 'ES']);
		Estado::create(['id' => 33,'nome' => 'RIO DE JANEIRO', 'sigla' => 'RJ']);
		Estado::create(['id' => 35,'nome' => 'SÃO PAULO', 'sigla' => 'SP']);
		Estado::create(['id' => 41,'nome' => 'PARANÁ', 'sigla' => 'PR']);
		Estado::create(['id' => 42,'nome' => 'SANTA CATARINA', 'sigla' => 'SC']);
		Estado::create(['id' => 43,'nome' => 'RIO GRANDE DO SUL', 'sigla' => 'RS']);
		Estado::create(['id' => 50,'nome' => 'MATO GROSSO DO SUL', 'sigla' => 'MS']);
		Estado::create(['id' => 51,'nome' => 'MATO GROSSO', 'sigla' => 'MT']);
		Estado::create(['id' => 52,'nome' => 'GOIÁS', 'sigla' => 'GO']);
		Estado::create(['id' => 53,'nome' => 'DISTRITO FEDERAL', 'sigla' => 'DF']);
    }
}
