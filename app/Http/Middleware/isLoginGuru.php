<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isLoginGuru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('guru')->check()) {
            $dataGuru = Auth::guard('guru')->user();
            return redirect('/absen/guru')
                    ->withInfo('Anda Sudah Login Sebagai Guru : ' . $dataGuru->nama . ' Mapel ' . $dataGuru->idmapel);
        }
        return $next($request);
    }
}
