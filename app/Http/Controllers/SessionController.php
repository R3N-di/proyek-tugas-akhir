<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index(){
        return view('page.login.login');
    }

    public function login(Request $request){
        $user = [
            'nis' => $request->nis,
            'password' => $request->password,
        ];

        if(Auth::guard('siswa')->attempt($user)){
            $request->session()->regenerate();
            return redirect('siswa/');
        }

        return back();
    }
}
