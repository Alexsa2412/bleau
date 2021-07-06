<?php

namespace App\Policies;

use App\Models\Pessoa\PessoaDocumento;
use App\Models\Usuario\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PessoaDocumentoPolicy
{
    use HandlesAuthorization;

    public function alteraPessoaDocumento(Usuario $usuario, PessoaDocumento $pessoaDocumento)
    {
        return $usuario->id === $pessoaDocumento->pessoa_id;
    }
}
