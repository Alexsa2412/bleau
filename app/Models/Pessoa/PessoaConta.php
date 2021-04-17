<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaConta extends Model
{
    use HasFactory;
    protected $table = 'pessoa_conta';
    protected $fillable = ['agencia','numero','operacao','tipo','pix','pessoa_id','banco_id'];
}
