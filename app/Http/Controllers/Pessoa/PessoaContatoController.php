<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\InsereAlteraContatoRequest;
use App\Models\Pessoa\PessoaContato;
use App\Repositories\Endereco\PaisRepository;
use App\Repositories\Pessoa\PessoaContatoRepository;

class PessoaContatoController extends Controller
{
    private $pessoaContatoRepository;
    private $paisRepository;

    public function __construct(PessoaContatoRepository $pessoaContatoRepository,
        PaisRepository $paisRepository)
    {
        $this->pessoaContatoRepository = $pessoaContatoRepository;
        $this->paisRepository = $paisRepository;
    }

    private function adicionaIdDaPessoaNoRequest($request):array{
        return array_merge($request->all(), ['pessoa_id' => auth()->user()->id]);
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
        abort_if(!$this->authorize('alteraContato', $contato), 403);
        $paises = $this->paisRepository->obterPaisesOrdenadosPorNome();
        return view('meus_dados.edita_contato', compact('paises', 'contato'));
    }

    public function alteraContatoPost(InsereAlteraContatoRequest $request, PessoaContato $contato)
    {
        $this->pessoaContatoRepository->updateById($contato->id, $request->all());
        return redirect()->route('meus_dados');
    }

    public function excluiContatoPost(PessoaContato $contato){
        abort_if(!$this->authorize('excluiContato', $contato), 403);
        $this->pessoaContatoRepository->deleteById($contato->id);
        flash('Contato excluído.');
        return redirect()->route('meus_dados');
    }
}
