<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika user sudah login dan memiliki role 'admin'
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        // Jika tidak, redirect ke dashboard user biasa dengan pesan error.
        // Anda bisa juga mengarahkannya ke halaman login atau menampilkan halaman 403 (Forbidden).
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman admin.');
    }
}