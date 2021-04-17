<?php

namespace App\Repositories\Usuario;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Usuario\Usuario;

class UsuarioRepository extends BaseRepository
{
    public function model()
    {
        return Usuario::class;
    }

    public function obterDadosDoUsuario($id)
    {
        return $this->getById($id)
            ->select(['nome','email'])
            ->first();
    }
}
