<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Models\Pessoa\Pessoa;
use App\Models\Pessoa\PessoaEndereco;
use App\Repositories\Endereco\EstadoRepository;
use App\Repositories\Endereco\PaisRepository;
use App\Repositories\Pessoa\PessoaDocumentoRepository;
use App\Repositories\Pessoa\PessoaEnderecoRepository;
use App\Repositories\Pessoa\PessoaRepository;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    private $pessoaRepository;
    private $estadoRepository;
    private $pessoaDocumentoRepository;
    private $pessoaEnderecoRepository;
    private $paisRepository;

    public function __construct(PessoaRepository $pessoaRepository,
                                EstadoRepository $estadoRepository,
                                PessoaDocumentoRepository $pessoaDocumentoRepository,
                                PessoaEnderecoRepository $pessoaEnderecoRepository,
                                PaisRepository $paisRepository)
    {
        $this->pessoaRepository = $pessoaRepository;
        $this->estadoRepository = $estadoRepository;
        $this->pessoaDocumentoRepository = $pessoaDocumentoRepository;
        $this->pessoaEnderecoRepository = $pessoaEnderecoRepository;
        $this->paisRepository = $paisRepository;
    }

    private function adicionaIdDaPessoaNoRequest($request){
        return array_merge($request->all(), ['pessoa_id' => auth()->user()->id]);
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
        $dados = $this->adicionaIdDaPessoaNoRequest($request);
        $this->pessoaDocumentoRepository->create($dados);
        flash()->success('Documento inserido com sucesso');
        return redirect()->route('meus_dados');
    }

    public function alteraPessoa()
    {
        $pessoa = $this->pessoaRepository->getById(auth()->user()->id);
        return view('meus_dados.edita_meus_dados', compact('pessoa'));
    }

    public function alteraPessoaPost(Request $request, Pessoa $pessoa){
        $pessoa = $this->pessoaRepository->updateById($pessoa->id, $request->all());
        flash("Dados pessoais atualizados");
        return redirect()->route('meus_dados');
    }

    public function alteraEndereco(PessoaEndereco $endereco)
    {
        $endereco = $this->pessoaEnderecoRepository->getById($endereco->id);

        if ($endereco->pessoa_id !== auth()->user()->id)
            abort(403, "Acesso não autorizado.");

        $paises = $this->paisRepository->all();
        $estados = $this->estadoRepository
            ->orderBy('nome')
            ->get();
        return view('meus_dados.edita_endereco', compact('endereco', 'paises', 'estados'));
    }

    public function alteraEnderecoPost(Request $request, PessoaEndereco $endereco)
    {
        $endereco = $this->pessoaEnderecoRepository->updateById($endereco->id, $request->all());
        flash('Endereço atualizado com sucesso.');
        return redirect()->route('meus_dados');
    }

    public function deletaTodosOsDocumentos()
    {
        $documentos = $this->pessoaDocumentoRepository->all();
        $this->pessoaDocumentoRepository
            ->where('pessoa_id', 1)
            ->delete();
        flash()->warning('todos os documentos deletados');
        return redirect()->route('meus_dados');
    }
}
