<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\AlteraPessoaRequest;
use App\Http\Requests\Pessoa\InsereDadosBasicosRequest;
use App\Services\Pessoa\PessoaService;
use App\Models\Convite\Convite;
use App\Models\Pessoa\Pessoa;
use App\Repositories\Pessoa\PessoaRepository;

class PessoaController extends Controller
{
    private $pessoaRepository;
    private $pessoaService;

    public function __construct(PessoaRepository $pessoaRepository,
        PessoaService $pessoaService)
    {
        $this->pessoaRepository = $pessoaRepository;
        $this->pessoaService = $pessoaService;
    }

    private function adicionaIdDaPessoaNoRequest($request) : array
    {
        return array_merge($request->all(), ['pessoa_id' => auth()->user()->id]);
    }

    public function meusDados()
    {
        $pessoa = $this->pessoaRepository
            ->getById(auth()->user()->id);
        return view('meus_dados.meus_dados', compact('pessoa'));
    }

    public function alteraPessoa()
    {
        $pessoa = $this->pessoaRepository->getById(auth()->user()->id);
        return view('meus_dados.edita_meus_dados', compact('pessoa'));
    }

    public function alteraPessoaPost(AlteraPessoaRequest $request, Pessoa $pessoa)
    {
        $this->pessoaRepository->updateById($pessoa->id, $request->all());
        flash("Dados pessoais atualizados");
        return redirect()->route('meus_dados');
    }

    public function adicionaDadosBasicos(Convite $convite)
    {
        return view('pessoa.adiciona_dados_basicos', compact('convite'));
    }

    public function adicionaDadosBasicosPost(InsereDadosBasicosRequest $request)
    {
        $codigoDoConvite = $request->get('codigo_do_convite');
        $this->pessoaService->adicionaDadosBasicos($request, $codigoDoConvite);

        if(auth()->check())
            return redirect()->route('meus_dados');

        return redirect()->route('login');
    }
}
