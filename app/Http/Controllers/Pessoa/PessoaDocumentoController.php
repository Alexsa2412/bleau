<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\InsereAlteraDocumentoRequest;
use App\Models\Pessoa\PessoaDocumento;
use App\Repositories\Endereco\EstadoRepository;
use App\Repositories\Pessoa\PessoaDocumentoRepository;
use Illuminate\Http\Request;

class PessoaDocumentoController extends Controller
{
    private $estadoRepository;
    private $pessoaDocumentoRepository;
    private $mensagemOK = "Seus documentos foram atualizados";

    public function __construct(EstadoRepository $estadoRepository,
        PessoaDocumentoRepository $pessoaDocumentoRepository)
    {
        $this->estadoRepository = $estadoRepository;
        $this->pessoaDocumentoRepository = $pessoaDocumentoRepository;
    }

    private function adicionaIdDaPessoaNoRequest($request):array{
        return array_merge($request->all(), ['pessoa_id' => auth()->user()->id]);
    }

    public function adicionaDocumento()
    {
        $estados = $this->estadoRepository->obterEstadosOrdenadosPorSigla();
        return view('meus_dados.adiciona_documento', compact('estados'));
    }

    public function adicionaDocumentoPost(InsereAlteraDocumentoRequest $request)
    {
        $this->pessoaDocumentoRepository->create($this->adicionaIdDaPessoaNoRequest($request));
        flash()->success($this->mensagemOK);
        return redirect()->route('meus_dados');
    }

    public function alteraDocumento(PessoaDocumento $pessoaDocumento)
    {
        abort_if(!$this->authorize('alteraPessoaDocumento', $pessoaDocumento), 403);
        $estados = $this->estadoRepository->obterEstadosOrdenadosPorSigla();
        return view('meus_dados.edita_documento', compact('estados', 'pessoaDocumento'));
    }

    public function alteraDocumentoPost(Request $request, PessoaDocumento $pessoaDocumento)
    {
        $this->pessoaDocumentoRepository->updateById($pessoaDocumento->id, $request->all());
        flash($this->mensagemOK)->success();
        return redirect()->route('meus_dados');
    }
}
