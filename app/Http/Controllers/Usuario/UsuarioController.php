<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Repositories\Usuario\UsuarioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function index()
    {
        $usuario = $this->usuarioRepository->obterDadosDoUsuario(1);
        return view('usuario', compact('usuario'));
    }

    public function login(Request $request)
    {
        //se eu já estiver logado me manda pra minha landpage do MeusDados
        if (auth()->check())
            redirect()->route('meus_dados');

        $credenciais = $request->only('email','password');
        if (Auth::attempt($credenciais))
        {
            return redirect()->route('meus_dados');
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }

    public function alterarSenha(Request $request)
    {

    }
}
