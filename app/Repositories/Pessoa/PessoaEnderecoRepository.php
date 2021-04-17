<?php

namespace App\Repositories\Pessoa;

use App\Models\Pessoa\PessoaEndereco;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class PessoaEnderecoRepository extends BaseRepository
{
    public function model()
    {
        return PessoaEndereco::class;
    }
}
