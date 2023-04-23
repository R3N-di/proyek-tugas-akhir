<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('web')->check()) {
            $dataAdmin = Auth::guard('web')->user();
            return redirect('/siswa')
                    ->withInfo('Anda Sudah Login Sebagai Admin : ' . $dataAdmin->name);
        }
        return $next($request);
    }
}
