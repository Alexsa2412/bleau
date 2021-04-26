<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\InsereAlteraContaRequest;
use App\Models\Pessoa\PessoaConta;
use App\Repositories\Banco\BancoRepository;
use App\Repositories\Pessoa\PessoaContaRepository;

class PessoaContaController extends Controller
{
    private $pessoaContaRepository;
    private $bancoRepository;

    public function __construct(PessoaContaRepository $pessoaContaRepository,
        BancoRepository $bancoRepository)
    {
        $this->pessoaContaRepository = $pessoaContaRepository;
        $this->bancoRepository = $bancoRepository;
    }

    private function adicionaIdDaPessoaNoRequest($request):array{
        return array_merge($request->all(), ['pessoa_id' => auth()->user()->id]);
    }

    public function adicionaConta()
    {
        $bancos = $this->bancoRepository->obterBancosOrdenadosPorNome();
        return view ('meus_dados.adiciona_conta', compact('bancos'));
    }

    public function adicionaContaPost(InsereAlteraContaRequest $request)
    {
        $this->pessoaContaRepository->create($this->adicionaIdDaPessoaNoRequest($request));
        flash('Seus dados bancários foram atualizados');
        return redirect()->route('meus_dados');
    }

    public function alteraConta(PessoaConta $conta)
    {
        $bancos = $this->bancoRepository->obterBancosOrdenadosPorNome();
        return view('meus_dados.edita_conta', compact('conta', 'bancos'));
    }

    public function alteraContaPost(InsereAlteraContaRequest $request, PessoaConta $conta)
    {
        $this->pessoaContaRepository->updateById($conta->id, $request->all());
        flash('Seus dados bancários foram atualizados');
        return redirect()->route('meus_dados');
    }

}
