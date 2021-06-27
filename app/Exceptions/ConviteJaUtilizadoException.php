<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ConviteJaUtilizadoException extends Exception
{
    protected $message = 'Convite já utilizado.';
    private $description = 'O convite requisitado já foi utilizado anteriormente e não é possível completar sua solicitação.';
    protected $code = 403;

    public function getDescription(){
        return $this->description;
    }
}
