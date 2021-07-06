<?php

namespace App\Policies;

use App\Models\Pessoa\PessoaEndereco;
use App\Models\Usuario\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PessoaEnderecoPolicy
{
    use HandlesAuthorization;

    public function alteraPessoaEndereco(Usuario $usuario, PessoaEndereco  $pessoaEndereco)
    {
        return $usuario->id === $pessoaEndereco->pessoa_id;
    }
}
