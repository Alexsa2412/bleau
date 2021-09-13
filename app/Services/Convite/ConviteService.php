<?php

namespace App\Services\Convite;

use App\Mail\ConviteEmail;
use App\Models\Convite\Convite;
use App\Repositories\Convite\ConviteRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConviteService
{
    private $conviteRepository;
    const CONVITE_UTILIZADO = 'sim';
    const CONVITE_NAO_UTILIZADO = 'nao';

    public function __construct(ConviteRepository $conviteRepository)
    {
        $this->conviteRepository = $conviteRepository;
    }

    public function obterRequisicao(Request $request) : array
    {
        return [
            'email_do_convidado' => $request->get('email_do_convidado'),
            'nome_do_convidado' => $request->get('nome_do_convidado'),
            'pessoa_id' => auth()->user()->id,
            'codigo_do_convite' => md5($request->get('email_do_convidado'))
        ];
    }

    public function obterUrlDeAceite(string $codigoDoConvite, string $emailDoConvidado) : string
    {
        $urlDoAceite = url('/convite/'.$codigoDoConvite.'/'.$emailDoConvidado);
        return $urlDoAceite;
    }

    public function enviaEmailParaConvidado(Convite $convite, string $urlDeAceite)
    {
        try {
            Mail::to($convite->email_do_convidado)->send(new ConviteEmail($convite, $urlDeAceite));
        } catch (\Exception $e) {
        }
    }

    public function emailJaConvidado(string $emailDoConvidado)
    {
        return $this->conviteRepository->emailJaConvidado($emailDoConvidado);
    }

    public function notificaUsoDoConvite(string $codigoDoConvite)
    {
        $convite = $this->conviteRepository->obterPorCodigoDoConvite($codigoDoConvite);
        $convite->utilizado = self::CONVITE_UTILIZADO;
        $convite->data_de_uso = Carbon::now();
        $convite->save();
    }
}
