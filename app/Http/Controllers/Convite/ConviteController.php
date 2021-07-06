<?php

namespace App\Http\Controllers\Convite;

use App\Exceptions\ConviteJaUtilizadoException;
use App\Exceptions\EmailJaCadastradoException;
use App\Exceptions\EmailJaUtilizadoNoConviteException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Convite\ConvidarRequest;
use App\Services\Convite\ConviteService;
use App\Services\Pessoa\PessoaService;
use App\Repositories\Convite\ConviteRepository;

class ConviteController extends Controller
{
    private $conviteRepository;
    private $conviteService;
    private $pessoaService;

    public function __construct(ConviteRepository $conviteRepository,
        ConviteService $conviteService,
        PessoaService $pessoaService)
    {
        $this->conviteRepository = $conviteRepository;
        $this->conviteService = $conviteService;
        $this->pessoaService = $pessoaService;
    }

    public function convidar()
    {
        return view('convite.convite');
    }

    public function convidarPost(ConvidarRequest $request)
    {
        $requisicao = $this->conviteService->obterRequisicao($request);
        $emailDoConvidado = $requisicao['email_do_convidado'];

        try {
            throw_if($this->pessoaService->emailJaCadastrado($emailDoConvidado), EmailJaCadastradoException::class);
            throw_if($this->conviteService->emailJaConvidado($emailDoConvidado), EmailJaUtilizadoNoConviteException::class);
        } catch (EmailJaCadastradoException $exception) {
            flash('Este e-mail "' . $emailDoConvidado . '" não é elegível a receber um convite.')->warning();
            return redirect()->back();
        } catch(EmailJaUtilizadoNoConviteException $exception) {
            flash($exception->getMessage())->warning();
            return redirect()->back();
        }

        $convite = $this->conviteRepository->create($requisicao);

        $urlDeAceite = $this->conviteService->obterUrlDeAceite($convite->codigo_do_convite, $convite->email_do_convidado);
        $this->conviteService->enviaEmailParaConvidado($convite, $urlDeAceite);

        flash('Seu convite para ' . $convite->nome_do_convidado . ' no e-mail ' . $convite->email_do_convidado . ' foi enviado.');
        return redirect()->route('convite.convidar');
    }

    public function queroParticipar(string $codigoDoConvite, string $emailDoConvidado)
    {
        $convite = $this->conviteRepository->obterPorCodigoEEmailDoConvidado($codigoDoConvite, $emailDoConvidado);

        try {
            throw_if($convite->utilizado == 'sim', ConviteJaUtilizadoException::class);
        } catch (ConviteJaUtilizadoException $exception) {
            return view('convite.erro_convite', compact('exception'));
        }

        return view('pessoa.adiciona_dados_basicos', compact('convite'));
    }

    public function teste()
    {
        return response()->json($this->conviteService->obterUrlDeAceite('abc123def456', 'email@servidor.com.br'));
    }
}
