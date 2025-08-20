<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika user sudah login DAN rolenya adalah 'superadmin'
        if (auth()->check() && auth()->user()->role == 'superadmin') {
            return $next($request);
        }

        // Jika bukan superadmin, lempar error 403 (Forbidden)
        abort(403, 'ANDA TIDAK MEMILIKI AKSES.');
    }
}