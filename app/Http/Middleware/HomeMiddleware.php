<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class HomeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Se estiver acessando "/home", redireciona para a view correta
        if ($request->is('home')) {
            if (!$user->aluno) {
                return response()->view('dashboard-admin');
            }
            return response()->view('dashboard-aluno');
        }
        
        return $next($request);
    }
}
