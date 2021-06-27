<?php

namespace App\Exceptions;

use Exception;

class EmailJaUtilizadoNoConviteException extends Exception
{
    protected $message = 'O e-mail informado já recebeu um convite.';
    protected $code = 403;
    private $description = 'O e-mail informado já possui um convite enviado e não é possível solicitar novo convite.';

    public function getDescription()
    {
        return $this->description;
    }
}
