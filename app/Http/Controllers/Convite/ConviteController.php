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
            'nome_convidado' => $request->get('nome_do_convidado'),
            'pessoa_id' => auth()->user()->id,
            'codigo_do_convite' => md5($request->get('email_do_convidado'))
        ];
    }

    public function convidarPost(ConvidarRequest $request)
    {
        $email = $request->get('email_do_convidado');

        $emailJaCadastrado = $this->pessoaRepository->emailJaUtilizado($email);
        if(!empty($emailJaCadastrado))
        {
            flash('Este e-mail "' . $email . '" não é elegível a receber um convite.')->warning();
            return redirect()->back();
        }

        $emailJaConvidado = $this->conviteRepository->emailJaConvidado($email);
        if(!empty($emailJaConvidado))
            return view('convite.jaconvidado', compact('emailJaConvidado'));

        $convite = $this->conviteRepository->create($this->obterRequisicao($request));
        return view('convite.emailenviado', compact('convite'));
    }

}
