<?php

namespace Database\Seeders;

use App\Models\Usuario\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create(['nome' => 'Bruno da Silva Ferreira', 'email' => 'bs.ferreiras@gmail.com', 'password' => bcrypt('123456')]);
        Usuario::create(['nome' => 'Alexsandra Olveira de Souza', 'email' => 'alexsa.aods1@gmail.com', 'password' => bcrypt('123')]);
    }
}
