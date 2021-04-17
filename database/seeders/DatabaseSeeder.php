<?php

namespace Database\Seeders;

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
            EstadoSeeder::class,
            CidadeSeeder::class,
            /* para desenvolvimento */
            UsuarioSeeder::class,
            EnderecoSeeder::class,
            DocumentoSeeder::class
        ]);
    }
}
