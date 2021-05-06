<?php

namespace App\Repositories\Pessoa;

use App\Models\Pessoa\Pessoa;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class PessoaRepository extends BaseRepository
{
    public function model()
    {
        return Pessoa::class;
    }

    public function emailJaUtilizado($email)
    {
        return $this->getByColumn($email, 'email')->first();
    }
}
