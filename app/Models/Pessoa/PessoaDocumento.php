<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaDocumento extends Model
{
    use HasFactory;
    protected $table = 'pessoa_documento';
    protected $fillable = ['numero','orgao_emissor','tipo_documento','data_de_emissao','estado_id','pessoa_id'];
}
