<?php

namespace App\Models\Pessoa;

use App\Models\Endereco\Cidade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaEndereco extends Model
{
    use HasFactory;
    protected $table = 'pessoa_endereco';
    protected $fillable = ['logradouro','numero','complemento','bairro','cep','cidade_id','pais_id','pessoa_id'];

    private function obterNumeroDescricao(){
        return $this->numero == '' ? 'S/N' : $this->numero;
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function obterLogradouroCompleto()
    {
        return $this->logradouro . ', ' . $this->obterNumeroDescricao() . ', ' . $this->bairro;
    }

    public function obterCepFormatado()
    {
        if ($this->cep != null && $this->cep != '')
            return substr($this->cep, 0, 2) . "." .
                substr($this->cep, 2, 3) . "-" .
                substr($this->cep, 5, 3);
        return "";
    }
}
