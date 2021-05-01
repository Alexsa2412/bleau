<?php

namespace App\Models\Endereco;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $table = 'pais';
    protected $fillable = ['nome','nacionalidade','codigo_de_area'];

    public function getCodigoDeAreaFormatadoAttribute()
    {
        $codigo_de_area = $this->attributes['codigo_de_area'];
        return empty($codigo_de_area) ? "" : "+" . $codigo_de_area;
    }
}
