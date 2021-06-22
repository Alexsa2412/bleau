<?php

namespace App\Http\Controllers\Endereco;

use App\Http\Controllers\Controller;
use App\Repositories\Endereco\CidadeRepository;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    private $cidadeRepository;

    public function __construct(CidadeRepository $cidadeRepository)
    {
        $this->cidadeRepository = $cidadeRepository;
    }

    public function obterCidadesPorEstadoAPI($estado_id)
    {
        $cidades = $this->cidadeRepository->obterCidadesPorEstado($estado_id);
        return response()->json($cidades);
    }
}
