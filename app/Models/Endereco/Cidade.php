<?php

namespace App\Models\Endereco;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;
    protected $table = 'cidade';
    protected $fillable = ['nome','estado_id'];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
