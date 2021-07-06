<?php

namespace App\Policies;

use App\Models\Pessoa\PessoaConta;
use App\Models\Usuario\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PessoaContaPolicy
{
    use HandlesAuthorization;

    public function alteraConta(Usuario $usuario, PessoaConta $pessoaConta)
    {
        return $usuario->id === $pessoaConta->pessoa_id;
    }
}
