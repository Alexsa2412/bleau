<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class MeusDadosController extends Controller
{
    function index(){
        //trocar o codigo 1 para o codigo da pessoa logada no sistema
        $pessoa = Pessoa::findOrFail(auth()->user()->id);
        return view('meus-dados.index', compact('pessoa'));
    }
}
