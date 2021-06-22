<?php

namespace App\Models\Pessoa;

use App\Helpers\StringHelper;
use App\Models\Endereco\Cidade;
use App\Models\Endereco\Pais;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaEndereco extends Model
{
    use HasFactory;
    protected $table = 'pessoa_endereco';
    protected $fillable = ['logradouro','numero','complemento','bairro','cep','cidade_id','pais_id','pessoa_id','estado_exterior','cidade_exterior'];

    private function obterNumeroDescricao(){
        return $this->numero == '' ? 'S/N' : $this->numero;
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function obterLogradouroCompleto()
    {
        return $this->logradouro . ', ' . $this->obterNumeroDescricao() . ', ' . $this->bairro;
    }

    public function obterCepFormatado()
    {
        return StringHelper::obterCepFormatado($this->cep);
    }
}
