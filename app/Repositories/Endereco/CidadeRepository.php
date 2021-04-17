<?php

namespace App\Repositories\Endereco;

use App\Models\Endereco\Cidade;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class CidadeRepository extends BaseRepository
{
    public function model()
    {
        return Cidade::class;
    }
}
