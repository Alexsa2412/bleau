<?php

namespace App\Policies;

use App\Models\Pessoa;
use App\Models\Usuario\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PessoaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Usuario\Usuario  $usuario
     * @return mixed
     */
    public function viewAny(Usuario $usuario)
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Usuario\Usuario  $usuario
     * @param  \App\Models\Pessoa  $pessoa
     * @return mixed
     */
    public function view(Usuario $usuario, Pessoa $pessoa)
    {
        return $usuario->id === $pessoa->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Usuario\Usuario  $usuario
     * @return mixed
     */
    public function create(Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Usuario\Usuario  $usuario
     * @param  \App\Models\Pessoa  $pessoa
     * @return mixed
     */
    public function update(Usuario $usuario, Pessoa $pessoa)
    {
        return $usuario->id === $pessoa->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Usuario\Usuario  $usuario
     * @param  \App\Models\Pessoa  $pessoa
     * @return mixed
     */
    public function delete(Usuario $usuario, Pessoa $pessoa)
    {
        return $usuario->id === $pessoa->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Usuario\Usuario  $usuario
     * @param  \App\Models\Pessoa  $pessoa
     * @return mixed
     */
    public function restore(Usuario $usuario, Pessoa $pessoa)
    {
        return $usuario->id === $pessoa->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Usuario\Usuario  $usuario
     * @param  \App\Models\Pessoa  $pessoa
     * @return mixed
     */
    public function forceDelete(Usuario $usuario, Pessoa $pessoa)
    {
        return $usuario->id === $pessoa->id;
    }
}
