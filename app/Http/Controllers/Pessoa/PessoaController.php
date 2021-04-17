<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Repositories\Pessoa\PessoaRepository;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    private $pessoaRepository;

    public function __construct(PessoaRepository $pessoaRepository)
    {
        $this->pessoaRepository = $pessoaRepository;
    }

    public function meusDados()
    {
        $pessoa = $this->pessoaRepository->getById(auth()->user()->id)->first();
        return view('meus_dados.meus_dados', compact('pessoa'));
    }

    public function adicionaDocumento()
    {
        $pessoa = $this->pessoaRepository->getById(auth()->user()->id)->first();
        return view('meus_dados.adiciona_documento', compact('pessoa'));
    }

    public function adicionaDocumentoPost(Request $request)
    {
        dd($request);
        return redirect()->route('meus_dados');
    }
}
