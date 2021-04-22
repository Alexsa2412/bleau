<?php

namespace Database\Seeders;

use App\Models\Endereco\Pais;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaisSeeder::class,
            EstadoSeeder::class,
            //CidadeSeeder::class,
            BancoSeeder::class,
            /* para desenvolvimento */
            UsuarioSeeder::class
        ]);
    }
}
