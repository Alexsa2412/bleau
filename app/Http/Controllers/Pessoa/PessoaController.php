<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Repositories\Endereco\EstadoRepository;
use App\Repositories\Pessoa\PessoaDocumentoRepository;
use App\Repositories\Pessoa\PessoaRepository;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    private $pessoaRepository;
    private $estadoRepository;
    private $pessoaDocumentoReposity;

    public function __construct(PessoaRepository $pessoaRepository,
                                EstadoRepository $estadoRepository,
                                PessoaDocumentoRepository $pessoaDocumentoRepository)
    {
        $this->pessoaRepository = $pessoaRepository;
        $this->estadoRepository = $estadoRepository;
        $this->pessoaDocumentoRepository = $pessoaDocumentoRepository;
    }

    public function meusDados()
    {
        $pessoa = $this->pessoaRepository->getById(auth()->user()->id)->first();
        return view('meus_dados.meus_dados', compact('pessoa'));
    }

    public function adicionaDocumento()
    {
        $pessoa = $this->pessoaRepository->getById(auth()->user()->id)->first();
        $estados = $this->estadoRepository
            ->orderBy('sigla')
            ->get();
        return view('meus_dados.adiciona_documento', compact('pessoa','estados'));
    }

    public function adicionaDocumentoPost(Request $request)
    {
        $dados = array_merge($request->all(), ['pessoa_id' => auth()->user()->id]);
        $this->pessoaDocumentoRepository->create($dados);
        flash('Documento inserido com sucesso')->success();
        return redirect()->route('meus_dados');
    }
}
