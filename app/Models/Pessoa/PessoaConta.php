<?php

namespace App\Models\Pessoa;

use App\Models\Banco\Banco;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaConta extends Model
{
    use HasFactory;
    protected $table = 'pessoa_conta';
    protected $fillable = ['agencia','numero','operacao','tipo','pix','pessoa_id','banco_id'];

    public function banco()
    {
        return $this->belongsTo(Banco::class);
    }

    public function getTipoDescricaoAttribute()
    {
        return $this->tipo == "corrente" ? "Conta Corrente" : "Conta Poupança";
    }
}
