<?php

namespace App\Models\Pessoa;

use App\Models\Endereco\Estado;
use Carbon\Carbon;
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
            default: return "";
        }
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function setDataDeEmissaoAttribute($data)
    {
        $this->attributes['data_de_emissao'] = null;
        if(!empty($data) && Carbon::createFromFormat('d/m/Y', $data) !== false)
            $this->attributes['data_de_emissao'] = Carbon::createFromFormat('d/m/Y', $data)->format('Y-m-d');
    }

    public function getDataDeEmissaoAttribute()
    {
        return ($this->attributes['data_de_emissao']) ?
            Carbon::createFromFormat('Y-m-d', $this->attributes['data_de_emissao'])->format('d/m/Y') :
            "";
    }
}
