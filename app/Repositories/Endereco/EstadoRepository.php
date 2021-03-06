<?php

namespace App\Repositories\Endereco;

use App\Models\Endereco\Estado;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class EstadoRepository extends BaseRepository
{
    public function model()
    {
        return Estado::class;
    }

    public function obterEstadosOrdenadosPorSigla(){
        return $this->orderBy('sigla', 'asc')->get();
    }
}
