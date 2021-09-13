<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\AlteraSenhaRequest;
use App\Repositories\Usuario\UsuarioRepository;
use Exception;
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
        $credenciais = $request->only('email','password');
        if (!auth()->check() && !Auth::attempt($credenciais))
        {
            flash('Os dados de login informados são inválidos')->error();
            return redirect()->back();
        }
        return redirect()->route('meus_dados');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }

    public function alterarSenha()
    {
        return view('usuario.edita_senha');
    }

    public function alterarSenhaPost(AlteraSenhaRequest $request)
    {
        $senha = $request->get('senhaatual');
        $novaSenha = $request->get('novasenha');
        $email = auth()->user()->email;
        $credenciais = [
            'email' => $email,
            'password' => $senha
        ];

        if(!Auth::validate($credenciais))
        {
            flash('A senha atual informada é inválida.');
            return redirect()->back();
        }

        try {
            $this->usuarioRepository->alterarSenha($novaSenha);
            flash('Sua senha foi atualizada.')->success();
            return redirect()->route('meus_dados');
        } catch (Exception $exception) {
            flash('Erro: ' . $exception->getMessage())->error();
            return redirect()->back();
        }
    }

    public function esqueciMinhaSenha()
    {
        if (auth()->check())
            return redirect()->route('meus_dados');

        return view('usuario.recuperar_senha.recuperar_senha');
    }

    public function iniciarProcessoDeRecuperacaoDeSenha(Request $request)
    {
        $email = $request->get('email');
        if (empty($email))
        {
            flash('Informe seu e-mail')->error();
            return redirect()->back();
        }
    }
}
