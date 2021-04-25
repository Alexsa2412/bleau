<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\InsereAlteraEnderecoRequest;
use App\Models\Pessoa\PessoaEndereco;
use App\Repositories\Endereco\CidadeRepository;
use App\Repositories\Endereco\EstadoRepository;
use App\Repositories\Endereco\PaisRepository;
use App\Repositories\Pessoa\PessoaEnderecoRepository;

class PessoaEnderecoController extends Controller
{
    private $pessoaEnderecoRepository;
    private $paisRepository;
    private $estadoRepository;
    private $cidadeRepository;

    public function __construct(PessoaEnderecoRepository $pessoaEnderecoRepository,
        PaisRepository $paisRepository,
        EstadoRepository $estadoRepository,
        CidadeRepository $cidadeRepository)
    {
        $this->pessoaEnderecoRepository = $pessoaEnderecoRepository;
        $this->paisRepository = $paisRepository;
        $this->estadoRepository = $estadoRepository;
        $this->cidadeRepository = $cidadeRepository;
    }

    public function alteraEndereco(PessoaEndereco $endereco)
    {
        $paises = $this->paisRepository->obterPaisesOrdenadosPorNome();
        $estados = $this->estadoRepository->obterEstadosOrdenadosPorSigla();
        return view('meus_dados.edita_endereco', compact('endereco', 'paises', 'estados'));
    }

    public function alteraEnderecoPost(InsereAlteraEnderecoRequest $request, PessoaEndereco $endereco)
    {
        $this->pessoaEnderecoRepository->updateById($endereco->id, $request->all());
        flash('Seu endereço foi atualizado');
        return redirect()->route('meus_dados');
    }

    public function adicionaEndereco()
    {
        $paises = $this->paisRepository->obterPaisesOrdenadosPorNome();
        $estados = $this->estadoRepository->obterEstadosOrdenadosPorSigla();
        $cidades = $this->cidadeRepository->obterCidadesOrdenadasPorNome();
        return view('meus_dados.adiciona_endereco', compact('paises', 'estados', 'cidades'));
    }

    public function adicionaEnderecoPost(InsereAlteraEnderecoRequest $request)
    {
        $this->pessoaEnderecoRepository->create($request->all());
        flash('Seu endereço foi atualizado');
        return redirect()->route('meus_dados');
    }
}
