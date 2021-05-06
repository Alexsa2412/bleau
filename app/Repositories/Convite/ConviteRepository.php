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
        $convite = $this->getByColumn($email, 'email')->first();
        return $convite;
    }
}
