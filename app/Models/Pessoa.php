<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = 'pessoas';

    protected $fillable = ['nome', 'email','fone1' ,'foto','data_nasc','nacionalidade','profissao','fone1','fone2','CPF','RG_NUM','org_emiss','uf_org','passaporte', 'logradouro','numero', 'complemento','bairro', 'cidade', 'estado','CEP', 'pais', 'banco','agencia','conta_corrente', 'tipo_operacao', 'tipo_conta', 'pix','situacao', 'aportado'];
}
