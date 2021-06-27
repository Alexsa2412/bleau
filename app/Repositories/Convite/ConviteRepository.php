<?php

namespace App\Repositories\Convite;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Convite\Convite;

class ConviteRepository extends BaseRepository
{
    public function model()
    {
        return Convite::class;
    }

    public function emailJaConvidado($email)
    {
        return $this->where('email_do_convidado', $email)->count() > 0;
    }

    public function obterPorEmail($emailDoConvidado)
    {
        return $this->where('email_do_convidado', $emailDoConvidado)->first();
    }

    public function obterPorCodigoDoConvite($codigoDoConvite)
    {
        return $this->where('codigo_do_convite', $codigoDoConvite)->first();
    }

    public function obterPorCodigoEEmailDoConvidado(string $codigoDoConvite, string $emailDoConvidado)
    {
        return $this->where('codigo_do_convite', $codigoDoConvite)
            ->where('email_do_convidado', $emailDoConvidado)
            ->with('pessoa')
            ->first();
    }
}
