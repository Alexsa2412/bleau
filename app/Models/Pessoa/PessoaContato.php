<?php

namespace App\Models\Pessoa;

use App\Models\Endereco\Pais;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaContato extends Model
{
    use HasFactory;
    protected $table = 'pessoa_contato';
    protected $fillable = ['numero','tipo_contato','whatsapp','telegram','pessoa_id','pais_id'];

    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    public function getEhWhatsappAttribute()
    {
        return $this->whatsapp === 'sim';
    }

    public function getEhTelegramAttribute()
    {
        //dd($this->telegram);
        return $this->telegram === 'sim';
    }

    public function getNumeroFormatadoAttribute()
    {
        //trim remover qualquer espaço que esteja sobrando na string, tanto do início quanto meio e fim
        $numero = trim($this->attributes['numero']);
        $caracteres = strlen($numero);
        $tipo_contato = $this->attributes['tipo_contato'];

        if ($caracteres == 8 and in_array($tipo_contato, ['residencial', 'comercial']))  //fixo sem ddd
        {
            return substr($numero, 0, 4) . "-" .
                substr($numero, 4, 4);
        }

        if ($caracteres == 10 and in_array($tipo_contato, ['residencial', 'comercial']))  //fixo com ddd
        {
            return "(" . substr($numero, 0, 2) . ") " .
                substr($numero, 2, 4) . "-" .
                substr($numero, 6, 4);
        }

        if ($caracteres == 10 and in_array($tipo_contato, ['celular'])) //celular sem ddd
        {
            return substr($numero, 0, 4) . "-" .
                substr($numero, 5, 4);
        }

        if ($caracteres == 12 and in_array($tipo_contato, ['celular'])) //celular com ddd
        {
            return "(" . substr($numero, 0, 2) . ") " .
                substr($numero, 2, 1) . " " .
                substr($numero, 3, 5) . "-" .
                substr($numero, 7, 4);
        }

        return $numero;
    }
}
