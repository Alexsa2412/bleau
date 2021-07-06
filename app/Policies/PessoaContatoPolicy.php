<?php

namespace App\Policies;

use App\Models\Pessoa\PessoaContato;
use App\Models\Usuario\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PessoaContatoPolicy
{
    use HandlesAuthorization;

    public function alteraContato(Usuario $usuario, PessoaContato $pessoaContato)
    {
        return $usuario->id === $pessoaContato->pessoa_id;
    }

    public function excluiContato(Usuario $usuario, PessoaContato $pessoaContato)
    {
        return $usuario->id === $pessoaContato->pessoa_id;
    }
}
