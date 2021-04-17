<?php

namespace App\Repositories\Pessoa;

use App\Models\Pessoa\PessoaConta;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class PessoaContaRepository extends BaseRepository
{
    public function model()
    {
        return PessoaConta::class;
    }
}
