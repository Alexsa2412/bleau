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
    private $paisRepository;

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
        $this->paisRepository = $paisRepository;
    }

    private function adicionaIdDaPessoaNoRequest($request):array{
        return array_merge($request->all(), ['pessoa_id' => auth()->user()->id]);
    }

    public function meusDados()
    {
        $pessoa = $this->pessoaRepository->getById(auth()->user()->id)->first();
        return view('meus_dados.meus_dados', compact('pessoa'));
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

}
