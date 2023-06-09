<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function beranda(){
        return view('beranda');
    }

    public function login_guru(){
        return view('page.login.guru');
    }

    public function login_siswa(){
        return view('page.login.siswa');
    }

    public function login_admin(){
        return view('page.login.admin');
    }

    public function login(Request $request){
        if($request->has('nis')){
            $request->validate([
                'nis' => 'required|integer|min_digits:8',
                'password' => 'required|string'
            ], [
                'nis.required' => 'NIS Harus Diisi',
                'nis.integer' => 'NIS Harus Berupa Angka',
                'nis.min_digits' => 'NIS Harus Memiliki 8 Angka',
                'password.required' => 'Password Harus Diisi',
                'password.string' => 'Password Harus Berbentuk Huruf',
            ]);
            $user = [
                'nis' => $request->nis,
                'password' => $request->password,
            ];

            if(Auth::guard('siswa')->attempt($user)){
                // $user = Auth::guard('siswa')->user();
                // dd($user);
                return redirect('absen/siswa');
            }
        }

        if($request->has('nip')){
            $request->validate([
                'nip' => 'required|integer|min_digits:18',
                'password' => 'required|string'
            ], [
                'nip.required' => 'NIP Harus Diisi',
                'nip.integer' => 'NIP Harus Berupa Angka',
                'nip.min_digits' => 'NIP Harus Memiliki 18 Angka',
                'password.required' => 'Password Harus Diisi',
                'password.string' => 'Password Harus Huruf',
            ]);
            $user = [
                'nip' => $request->nip,
                'password' => $request->password,
            ];

            if(Auth::guard('guru')->attempt($user)){
                return redirect('absen/guru');
            }
        }

        if($request->has('email')){
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ], [
                'email.required' => 'Email Harus Diisi',
                'email.email' => 'Format Email salah',
                'password.required' => 'Password Harus Diisi',
            ]);
            $user = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if(Auth::guard('web')->attempt($user)){
                return redirect('siswa/');
            }
        }

        return back()->withErrors('Tidak Berhasil Login, ada yang salah dari yang Anda masukan');
    }

    public function logout(){
        Session::flush();
        Session::invalidate();
        Session::regenerateToken();

        Auth::logout();
        return redirect('/beranda');
    }

}
