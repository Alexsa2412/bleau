<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\AlteraPessoaRequest;
use App\Models\Pessoa\Pessoa;
use App\Repositories\Endereco\PaisRepository;
use App\Repositories\Pessoa\PessoaRepository;

class PessoaController extends Controller
{
    private $pessoaRepository;
    private $paisRepository;

    public function __construct(PessoaRepository $pessoaRepository,
                                PaisRepository $paisRepository)
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
}
