<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserIsWriter
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @retun \Illuminate\Http\Response/\Illuminate\Http\RedireResponse
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user() && Auth::user()->is_writer){
            return $next($request);
        }

        return redirect(route('homepage'))->with('message', 'Non sei autorizzato');
       
    }
}
