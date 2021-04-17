<?php

namespace App\Repositories\Banco;

use App\Models\Banco\Banco;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class BancoRepository extends BaseRepository
{
    public function model()
    {
        return Banco::class;
    }
}
