<?php

namespace App\Exceptions;

use Exception;

class EmailJaCadastradoException extends Exception
{
    protected $message = 'O e-mail informado já está em uso.';
    protected $code = 403;
    private $description = 'O e-mail informado já está sendo utilizado em outro cadastro e não é possível realizar sua solicitação.';

    public function getDescription()
    {
        return $this->description;
    }
}
