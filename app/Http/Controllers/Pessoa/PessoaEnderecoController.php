<?php

namespace App\Http\Controllers\Pessoa;

use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\InsereAlteraEnderecoRequest;
use App\Models\Pessoa\PessoaEndereco;
use App\Repositories\Endereco\CidadeRepository;
use App\Repositories\Endereco\EstadoRepository;
use App\Repositories\Endereco\PaisRepository;
use App\Repositories\Pessoa\PessoaEnderecoRepository;
use Illuminate\Http\Request;

class PessoaEnderecoController extends Controller
{
    private $pessoaEnderecoRepository;
    private $paisRepository;
    private $estadoRepository;
    private $cidadeRepository;
    private $mensagemOK = "Seu endereço foi atualizado";

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
        $cidades = $this->cidadeRepository
            ->obterCidadesOrdenadasPorNome()
            ->where('estado_id', '=', optional(optional($endereco->cidade)->estado)->id);
        return view('meus_dados.edita_endereco', compact('endereco', 'paises', 'estados','cidades'));
    }

    public function trataDadosDaRequisicao(Request $request) : Request
    {
        if ($request->pais_id == 1)
            $request->merge(['estado_exterior' => null, 'cidade_exterior' => null]);

        if ($request->pais_id != 1)
            $request->merge(['estado_id' => null, 'cidade_id' => null]);

        $request->merge(['cep' => StringHelper::removeCaracteresEspeciais($request->cep)]);

        $request->merge(['pessoa_id' => auth()->user()->id]);

        return $request;
    }

    public function alteraEnderecoPost(InsereAlteraEnderecoRequest $request, PessoaEndereco $endereco)
    {
        $this->pessoaEnderecoRepository->updateById($endereco->id, $this->trataDadosDaRequisicao($request)->all());
        flash($this->mensagemOK);
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
        $this->pessoaEnderecoRepository->create($this->trataDadosDaRequisicao($request)->all());
        flash($this->mensagemOK);
        return redirect()->route('meus_dados');
    }
}
