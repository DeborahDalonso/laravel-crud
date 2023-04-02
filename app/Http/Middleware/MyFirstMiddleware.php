<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyFirstMiddleware
{
    private $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    // public function handle(Request $request, Closure $next)
    // {
    //     dd($this->users->get());
    //     // dd('Middleware');

    //     //Analise de request
    //     if(Auth::check())
    //         return $next($request);

    //     // dd('Não Logado');
    // }

    // public function handle(Request $request, Closure $next)
    // {
    //     $response = $next($request);

    //     //Analise de response
    //     if($this->users->count() === 5)
    //         return $response;

    //     dd('Erro');
    // }

    //Podemos passar parametros
    public function handle(Request $request, Closure $next, $role)
    {
        dd($role);

        return  $next($request);
    }
}
