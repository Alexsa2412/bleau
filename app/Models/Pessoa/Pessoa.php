<?php

namespace App\Models\Pessoa;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoa';
    protected $fillable = ['email','data_de_nascimento','nome','profissao','estado_civil','situacao','aportado'];
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

    public function setDataDeNascimentoAttribute($value)
    {
        $this->attributes['data_de_nascimento'] = null;
        if (!empty($value) && Carbon::createFromFormat('d/m/Y', $value) !== false) {
            $this->attributes['data_de_nascimento'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        }
    }

    public function getDataDeNascimentoAttribute($value)
    {
        dd($value);
        return ($this->attributes['data_de_nascimento'] != null) ?
            Carbon::createFromFormat('Y-m-d', $this->attributes['data_de_nascimento'])->format('d/m/Y') :
            "";
    }

    public function getEnderecoAtualAttribute()
    {
        //dd($this->enderecos());
        return $this->enderecos()
            ->where('pessoa_id', $this->id)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function getContaAtualAttribute()
    {
        return $this->contas()
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
