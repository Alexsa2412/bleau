<?php

namespace App\Models\Usuario;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'pessoa';
    protected $fillable = ['email','nome','password'];
    protected $hidden = ['password'];
}
