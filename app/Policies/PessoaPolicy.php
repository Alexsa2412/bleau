<?php

namespace App\Policies;

use App\Models\Pessoa;
use App\Models\Usuario\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PessoaPolicy
{
    use HandlesAuthorization;

    public function viewAny(Usuario $usuario)
    {
        return auth()->check();
    }

    public function view(Usuario $usuario, Pessoa $pessoa)
    {
        return $usuario->id === $pessoa->id;
    }

    public function create(Usuario $usuario)
    {
        //
    }

    public function update(Usuario $usuario, Pessoa $pessoa)
    {
        return $usuario->id === $pessoa->id;
    }

    public function delete(Usuario $usuario, Pessoa $pessoa)
    {
        return $usuario->id === $pessoa->id;
    }

    public function restore(Usuario $usuario, Pessoa $pessoa)
    {
        return $usuario->id === $pessoa->id;
    }

    public function forceDelete(Usuario $usuario, Pessoa $pessoa)
    {
        return $usuario->id === $pessoa->id;
    }
}
