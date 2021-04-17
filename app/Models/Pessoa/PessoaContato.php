<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaContato extends Model
{
    use HasFactory;
    protected $table = 'pessoa_contato';
    protected $fillable = ['numero','tipo_contato','whatsapp','pessoa_id'];
}
