<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmailIkmi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah user sudah login
        // 2. Cek apakah email user mengandung '@ikmi.ac.id'
        if (!auth()->check() || !str_contains(auth()->user()->email, '@ikmi.ac.id')) {
            // Jika salah satu syarat tidak terpenuhi, lempar error 403
            abort(403, 'Akses Ditolak! Hanya akun dengan email @ikmi.ac.id yang diizinkan menghapus data.');
        }

        return $next($request);
    }
}