<?php

namespace App\Http\Controllers\Endereco;

use App\Http\Controllers\Controller;
use App\Repositories\Endereco\EstadoRepository;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    private $estadoRepository;

    public function __construct(EstadoRepository $estadoRepository)
    {
        $this->estadoRepository = $estadoRepository;
    }

    public function obterCidadesPorEstadoAPI($id){
        $estado = $this->estadoRepository->getById($id);
        return $estado->cidades->where('id', '!=', $id);
    }
}
