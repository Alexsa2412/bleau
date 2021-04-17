<?php

namespace App\Models\Endereco;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $table = 'estado';    
    protected $fillable = ['nome','sigla'];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
}
