<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**å
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role === 'admin') {
            return $next($request);
        }
        abort(403, 'Access denied');
    }
}
