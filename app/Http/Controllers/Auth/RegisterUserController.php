<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller {

    public function showRegisterJasa() {
        return view('auth/register-jasa');
    }

    public function registerJasa(Request $request) {
        $email = $request->post('email');
        $username = $request->post('username');
        $password = $request->post('password');
        $telp = $request->post('telp');

        $data = DB::table('jasa')->insert([
            'email' => $email,
            'username' => $username,
            'telp' => $telp,
            'password' => Hash::make($password),
        ]);

        if ($data) {
            return redirect('/jasa/login');
        }else{
            return back()->withInput();
        }
    }
    

}
