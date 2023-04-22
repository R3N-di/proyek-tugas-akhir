<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isLoginSiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('siswa')->check()) {
            $dataSiswa = Auth::guard('siswa')->user();
            return redirect('/absen/siswa')
                    ->withInfo('Anda Sudah Login Sebagai Siswa : ' . $dataSiswa->nama . ' Kelas ' . $dataSiswa->idkelas . ' Jurusan ' . $dataSiswa->idjurusan);
        }
        return $next($request);
    }
}
