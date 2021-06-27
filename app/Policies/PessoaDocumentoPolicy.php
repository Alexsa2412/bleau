<?php

namespace App\Policies;

use App\Models\PessoaDocumento;
use App\Models\Usuario\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PessoaDocumentoPolicy
{
    use HandlesAuthorization;

    public function alteraDocumentoPost(Usuario $usuario, PessoaDocumento $pessoaDocumento)
    {
        dd($usuario->id, $pessoaDocumento->pessoa_id);
        return $usuario->id === $pessoaDocumento->pessoa_id;
    }

    public function alteraDocumento(Usuario $usuario, PessoaDocumento $pessoaDocumento)
    {
        dd($usuario->id, $pessoaDocumento->pessoa_id);
        return $usuario->id === $pessoaDocumento->pessoa_id;
    }

    public function update(Usuario $usuario, PessoaDocumento $pessoaDocumento)
    {
        dd($usuario->id, $pessoaDocumento->pessoa_id);
        return $usuario->id === $pessoaDocumento->pessoa_id;
    }
}
