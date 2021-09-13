<?php


namespace App\Services\Usuario;


use App\Repositories\Usuario\UsuarioRepository;

class UsuarioService
{
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function obterCodigoDeVerificacao() : string
    {
        return "";
    }
}
