<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pessoa\AlteraPessoaRequest;
use App\Models\Pessoa\Pessoa;
use App\Models\Pessoa\PessoaConta;
use App\Models\Pessoa\PessoaEndereco;
use App\Repositories\Banco\BancoRepository;
use App\Repositories\Endereco\EstadoRepository;
use App\Repositories\Endereco\PaisRepository;
use App\Repositories\Pessoa\PessoaContaRepository;
use App\Repositories\Pessoa\PessoaContatoRepository;
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
    private $pessoaContaRepository;
    private $bancoRepository;
    private $pessoaContatoRepository;

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
        $this->estadoRepository = $estadoRepository;
        $this->pessoaDocumentoRepository = $pessoaDocumentoRepository;
        $this->pessoaEnderecoRepository = $pessoaEnderecoRepository;
        $this->pessoaContaRepository = $pessoaContaRepository;
        $this->paisRepository = $paisRepository;
        $this->bancoRepository = $bancoRepository;
        $this->pessoaContatoRepository = $pessoaContatoRepository;
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

    public function alteraPessoaPost(AlteraPessoaRequest $request, Pessoa $pessoa){
        $this->pessoaRepository->updateById($pessoa->id, $request->all());
        flash("Dados pessoais atualizados");
        return redirect()->route('meus_dados');
    }

    public function alteraEndereco(PessoaEndereco $endereco)
    {
        if ($endereco->pessoa_id !== auth()->user()->id)
            abort(403, "Acesso não autorizado.");

        $paises = $this->paisRepository
            ->orderBy('nome')
            ->get();

        $estados = $this->estadoRepository
            ->orderBy('nome')
            ->get();

        return view('meus_dados.edita_endereco', compact('endereco', 'paises', 'estados'));
    }

    public function alteraEnderecoPost(Request $request, PessoaEndereco $endereco)
    {
        $this->pessoaEnderecoRepository->updateById($endereco->id, $request->all());
        flash('Seu endereço foi atualizado');
        return redirect()->route('meus_dados');
    }

    public function adicionaConta()
    {
        $bancos = $this->bancoRepository
            ->orderBy('nome')
            ->get();
        return view ('meus_dados.adiciona_conta', compact('bancos'));
    }

    public function adicionaContaPost(Request $request)
    {
        $dados = $this->adicionaIdDaPessoaNoRequest($request);
        $this->pessoaContaRepository->create($dados);
        flash('Seus dados bancários foram atualizados');
        return redirect()->route('meus_dados');
    }

    public function alteraConta(PessoaConta $conta)
    {
        $bancos = $this->bancoRepository->orderBy('nome')->get();
        return view('meus_dados.edita_conta', compact('conta', 'bancos'));
    }

    public function alteraContaPost(Request $request, PessoaConta $conta)
    {
        $this->pessoaContaRepository->updateById($conta->id, $request->all());
        flash('Seus dados bancários foram atualizados');
        return redirect()->route('meus_dados');
    }

    public function adicionaContato()
    {
        return view('meus_dados.adiciona_contato');
    }

    public function adicionaContatoPost(Request $request)
    {
        $dados = $this->adicionaIdDaPessoaNoRequest($request);
        $this->pessoaContatoRepository->create($dados);
        flash('Seus contatos foram atualizdos');
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
