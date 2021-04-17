<?php

namespace App\Repositories\Pessoa;

use App\Models\Pessoa\PessoaContato;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class PessoaContatoRepository extends BaseRepository
{
    public function model()
    {
        return PessoaContato::class;
    }
}
