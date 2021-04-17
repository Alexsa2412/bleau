<?php

namespace App\Repositories\Pessoa;

use App\Models\Pessoa\PessoaDocumento;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class PessoaDocumentoRepository extends BaseRepository
{
    public function model()
    {
        return PessoaDocumento::class;
    }

    private function obterDocumentoPorTipoEPessoa($tipo_documento, $pessoa_id)
    {
        return PessoaDocumento::where('tipo_documento', $tipo_documento)
            ->where('pessoa_id', $pessoa_id)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function obterPassaporte($pessoa_id)
    {
        return $this->obterDocumentoPorTipoEPessoa('passaporte', $pessoa_id);
    }

    public function obterRg($pessoa_id)
    {
        return $this->obterDocumentoPorTipoEPessoa('rg', $pessoa_id);
    }
}
