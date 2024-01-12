<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna memiliki role_id = 1 (admin)
        if (auth()->check() && auth()->user()->role_id == 1) {
            return $next($request);
        }

        // Jika bukan admin, redirect ke halaman lain atau tampilkan pesan error
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
    }
}
