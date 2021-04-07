<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    
    public function login(LoginRequest $request)
    {
        $credenciais = $request->only('email','password');
        if (Auth::attempt($credenciais))
        {
            return redirect()->route('login.sucesso');
        }

        return back();
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return view('login.index');
    }

    public function resetarSenha()
    {
        $usuario = Pessoa::findOrFail(1);
        $usuario->password = bcrypt('123');
        $usuario->save();
    }
}
