<?php

namespace App\Models\Pessoa;

use App\Models\Endereco\Estado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaDocumento extends Model
{
    use HasFactory;
    protected $table = 'pessoa_documento';
    protected $fillable = ['numero','orgao_emissor','tipo_documento','data_de_emissao','estado_id','pessoa_id'];

    public function getTipoDocumentoDescricaoAttribute()
    {
        switch ($this->attributes['tipo_documento'])
        {
            case "rg": return "Registro Geral";
            case "passaporte": return "Passaporte";
            case "cpf": return "CPF";
            case "cis": return "CIS";
        }
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
