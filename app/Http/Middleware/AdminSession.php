<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->has('admin_user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login untuk mengakses halaman admin.');
        }

        return $next($request);
    }
}
