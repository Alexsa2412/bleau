<?php

namespace App\Models\Convite;

use App\Models\Pessoa\Pessoa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convite extends Model
{
    use HasFactory;

    protected $table = 'convite';
    protected $fillable = ['email_do_convidado', 'nome_do_convidado', 'codigo_do_convite', 'pessoa_id'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}
