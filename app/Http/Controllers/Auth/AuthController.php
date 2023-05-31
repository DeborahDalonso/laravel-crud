<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginStoreRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formRegister()
    {
        //Verifica se usuario continua logado, se há uma sessão ativa
        if (\Auth::check())
            return redirect()->route('user.index');

        return view('auth.register');
    }

    public function formLogin()
    {
        if (\Auth::check())
            return redirect()->route('user.index');

        return view('auth.login');
    }

    public function login(LoginStoreRequest $request)
    {
        $credentials = $request->validate();

        //Metodo para validação das credenciais, por padrão email e senha
        if (\Auth::attempt($credentials)) {

            $request->session()->regenerate(); //Regenerar a sessão

            //intended redireciona para rota que o usuario esta tentando acessar e, caso não haja uma, redireciona para q é passada como parametro
            return redirect()->intended(route('user.index'));
        }

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        \Auth::logout();

        //Removendo sessão do usuario e regenerando o token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
