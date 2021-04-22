<?php

namespace App\Models\Banco;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;
    protected $table = 'banco';
    protected $fillable = ['nome','codigo','pais_id'];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
}
