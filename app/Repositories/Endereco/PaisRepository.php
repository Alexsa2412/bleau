<?php

namespace App\Repositories\Endereco;

use App\Models\Endereco\Pais;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class PaisRepository extends BaseRepository
{
    public function model()
    {
        return Pais::class;
    }

    public function obterPaisesOrdenadosPorNome()
    {
        return $this->orderBy('nome', 'asc')->get();
    }
}
