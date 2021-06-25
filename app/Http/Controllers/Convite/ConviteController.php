<?php

namespace App\Http\Controllers\Convite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Convite\ConvidarRequest;
use App\Repositories\Convite\ConviteRepository;
use App\Repositories\Pessoa\PessoaRepository;
use Illuminate\Http\Request;

class ConviteController extends Controller
{
    private $pessoaRepository;
    private $conviteRepository;

    public function __construct(PessoaRepository $pessoaRepository,
        ConviteRepository $conviteRepository)
    {
        $this->pessoaRepository = $pessoaRepository;
        $this->conviteRepository = $conviteRepository;
    }

    public function convidar()
    {
        return view('convite.convite');
    }

    private function obterRequisicao(Request $request) : array
    {
        return [
            'email_do_convidado' => $request->get('email_do_convidado'),
            'nome_do_convidado' => $request->get('nome_do_convidado'),
            'pessoa_id' => auth()->user()->id,
            'codigo_do_convite' => md5($request->get('email_do_convidado'))
        ];
    }

    public function convidarPost(ConvidarRequest $request)
    {
        $email = $request->get('email_do_convidado');

        if($this->pessoaRepository->emailJaUtilizado($email))
        {
            flash('Este e-mail "' . $email . '" não é elegível a receber um convite.')->warning();
            return redirect()->back();
        }

        $this->conviteRepository->create($this->obterRequisicao($request));
        flash("Seu convite para o e-mail <span style='font-weight: bold'>{$email}</span> foi enviado.")->success();
        return redirect()->route('meus_dados');
    }

}
