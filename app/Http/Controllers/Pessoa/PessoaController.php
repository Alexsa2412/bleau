<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\AlteraPessoaRequest;
use App\Http\Requests\Pessoa\InsereAlteraContaRequest;
use App\Http\Requests\Pessoa\InsereAlteraContatoRequest;
use App\Http\Requests\Pessoa\InsereAlteraDocumentoRequest;
use App\Models\Pessoa\Pessoa;
use App\Models\Pessoa\PessoaConta;
use App\Models\Pessoa\PessoaContato;
use App\Repositories\Banco\BancoRepository;
use App\Repositories\Endereco\EstadoRepository;
use App\Repositories\Endereco\PaisRepository;
use App\Repositories\Pessoa\PessoaContaRepository;
use App\Repositories\Pessoa\PessoaContatoRepository;
use App\Repositories\Pessoa\PessoaDocumentoRepository;
use App\Repositories\Pessoa\PessoaEnderecoRepository;
use App\Repositories\Pessoa\PessoaRepository;

class PessoaController extends Controller
{
    private $pessoaRepository;
    private $estadoRepository;
    private $pessoaDocumentoRepository;
    private $paisRepository;
    private $pessoaContaRepository;
    private $bancoRepository;
    private $pessoaContatoRepository;

    public function __construct(PessoaRepository $pessoaRepository,
                                EstadoRepository $estadoRepository,
                                PessoaDocumentoRepository $pessoaDocumentoRepository,
                                PessoaEnderecoRepository $pessoaEnderecoRepository,
                                PessoaContaRepository $pessoaContaRepository,
                                PaisRepository $paisRepository,
                                BancoRepository $bancoRepository,
                                PessoaContatoRepository $pessoaContatoRepository)
    {
        $this->pessoaRepository = $pessoaRepository;
        $this->estadoRepository = $estadoRepository;
        $this->pessoaDocumentoRepository = $pessoaDocumentoRepository;
        $this->pessoaEnderecoRepository = $pessoaEnderecoRepository;
        $this->pessoaContaRepository = $pessoaContaRepository;
        $this->paisRepository = $paisRepository;
        $this->bancoRepository = $bancoRepository;
        $this->pessoaContatoRepository = $pessoaContatoRepository;
    }

    private function adicionaIdDaPessoaNoRequest($request):array{
        return array_merge($request->all(), ['pessoa_id' => auth()->user()->id]);
    }

    public function meusDados()
    {
        $pessoa = $this->pessoaRepository->getById(auth()->user()->id)->first();
        return view('meus_dados.meus_dados', compact('pessoa'));
    }

    public function adicionaDocumento()
    {
        $estados = $this->estadoRepository->obterEstadosOrdenadosPorSigla();
        return view('meus_dados.adiciona_documento', compact('estados'));
    }

    public function adicionaDocumentoPost(InsereAlteraDocumentoRequest $request)
    {
        $this->pessoaDocumentoRepository->create($this->adicionaIdDaPessoaNoRequest($request));
        flash()->success('Documento inserido com sucesso');
        return redirect()->route('meus_dados');
    }

    public function alteraDocumento()
    {
        $estados = $this->estadoRepository->obterEstadosOrdenadosPorSigla();
        return view('meus_dados.edita_documento', compact('estados'));
    }

    public function alteraPessoa()
    {
        $pessoa = auth()->user();
        return view('meus_dados.edita_meus_dados', compact('pessoa'));
    }

    public function alteraPessoaPost(AlteraPessoaRequest $request, Pessoa $pessoa){
        $this->pessoaRepository->updateById($pessoa->id, $request->all());
        flash("Dados pessoais atualizados");
        return redirect()->route('meus_dados');
    }

    public function adicionaContato()
    {
        $paises = $this->paisRepository->obterPaisesOrdenadosPorNome();
        return view('meus_dados.adiciona_contato', compact('paises'));
    }

    public function adicionaContatoPost(InsereAlteraContatoRequest $request)
    {
        $this->pessoaContatoRepository->create($this->adicionaIdDaPessoaNoRequest($request));
        flash('Seus contatos foram atualizados');
        return redirect()->route('meus_dados');
    }

    public function alteraContato(PessoaContato $contato)
    {
        $paises = $this->paisRepository->obterPaisesOrdenadosPorNome();
        return view('meus_dados.edita_contato', compact('paises', 'contato'));
    }

    public function alteraContatoPost(InsereAlteraContatoRequest $request, PessoaContato $contato)
    {
        $this->pessoaContatoRepository->updateById($contato->id, $request->all());
    }
}
