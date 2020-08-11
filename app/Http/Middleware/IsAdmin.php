<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      // Verifica se está logado, se não tiver redireciona
         if ( !auth()->check() )
             return redirect()->route('login');

         /*
         * Verifica se é admin
         */
         // Recupera o tipo do usuário logado
         $tipo = auth()->user()->tipo;

         // Verifica se é admin caso não se redireciona para a Home Page
         if ( $tipo != 'admin' )
             return redirect('/');


         // Permite que continue (Caso não entre em nenhum dos if acima)...
        return $next($request);
    }
}
