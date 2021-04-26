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
}
