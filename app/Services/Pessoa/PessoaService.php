<?php

namespace App\Services\Pessoa;

use App\Models\Pessoa\Pessoa;
use App\Services\Convite\ConviteService;
use App\Repositories\Convite\ConviteRepository;
use App\Repositories\Pessoa\PessoaRepository;

class PessoaService
{
    private $pessoaRepository;
    private $conviteService;
    private $conviteRepository;

    public function __construct(PessoaRepository $pessoaRepository,
        ConviteService $conviteService,
        ConviteRepository $conviteRepository)
    {
        $this->pessoaRepository = $pessoaRepository;
        $this->conviteService = $conviteService;
        $this->conviteRepository = $conviteRepository;
    }

    public function emailJaCadastrado(string $email)
    {
        return $this->pessoaRepository->emailJaCadastrado($email);
    }

    public function adicionaDadosBasicos($request, $codigoDoConvite)
    {
        $convite = $this->conviteRepository->obterPorCodigoDoConvite($codigoDoConvite);

        $pessoa = new Pessoa();
        $pessoa->nome = $request->get('nome');
        $pessoa->email = $convite->email_do_convidado;
        $pessoa->data_de_nascimento = $request->get('data_de_nascimento');
        $pessoa->estado_civil = $request->get('estado_civil');
        $pessoa->profissao = $request->get('profissao');
        $pessoa->password = bcrypt($request->get('senha'));
        $pessoa->save();

        $this->conviteService->notificaUsoDoConvite($codigoDoConvite);

        $credenciais = [
            'email' => $pessoa->email,
            'password' => $request->get('senha')
        ];

        auth()->attempt($credenciais);

        return $pessoa;
    }
}
