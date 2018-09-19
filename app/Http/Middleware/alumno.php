<?php

namespace App\Http\Middleware;

use Closure;

class alumno
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
        if(
            auth()->check() && $request->user()->id_tipopersona==3
        ) {
            return $next($request);
        }else {
            return redirect('/home');
        }

    }
}
