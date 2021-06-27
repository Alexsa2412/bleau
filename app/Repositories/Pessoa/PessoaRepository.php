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

    public function emailJaCadastrado($email)
    {
        return $this->where('email', $email)->count() > 0;
    }
}
