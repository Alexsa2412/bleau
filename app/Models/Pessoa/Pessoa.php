<?php

namespace App\Models\Pessoa;

use App\Repositories\Pessoa\PessoaDocumentoRepository;
use App\Repositories\Pessoa\PessoaEnderecoRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoa';
    protected $fillable = ['email','data_de_nascimento','nome','profissao','situacao','aportado'];
    protected $hidden = ['password'];

    public function contas()
    {
        return $this->hasMany(PessoaConta::class);
    }

    public function contatos()
    {
        return $this->hasMany(PessoaContato::class);
    }

    public function documentos()
    {
        return $this->hasMany(PessoaDocumento::class);
    }

    public function enderecos()
    {
        return $this->hasMany(PessoaEndereco::class);
    }

    public function getEnderecoAtualAttribute()
    {
        return $this->enderecos()
            ->where('pessoa_id', $this->id)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function getPassaporteAttribute()
    {
        return $this->documentos()
            ->where('tipo_documento', 'passaporte')
            ->first();
    }

    public function getRgAttribute()
    {
        return $this->documentos()
            ->where('tipo_documento', 'rg')
            ->first();
    }

    public function getCpfAttribute()
    {
      return $this->documentos()
          ->where('tipo_documento', 'cpf')
          ->first();
    }

    public function getCisAttribute()
    {
        return $this->documentos()
            ->where('tipo_documento', 'cis')
            ->first();
    }
}
