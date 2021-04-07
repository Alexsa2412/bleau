<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pessoa extends Authenticatable
{
	use Notifiable;
    protected $table = 'pessoas';
    protected $fillable = [
        'email',
        'nome',
        'password',
        'cpf',
        'foto',
        'data_de_nascimento',
        'nacionalidade',
        'profissao',
        'situacao',
        'aportado',
        'tipo_usuario'
    ];
}
