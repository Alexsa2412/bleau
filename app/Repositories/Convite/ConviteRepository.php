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

    public function obterPorEmail($email){
        return $this->where('email_do_convidado', $email)->first();
    }
}
