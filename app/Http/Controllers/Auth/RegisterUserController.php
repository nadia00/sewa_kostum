<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller {

    public function showJasa() {
        return view('auth/register-jasa');
    }
    
    public function registerJasa(Request $request) {
        $email = $request->post('email');
        $username = $request->post('username');
        $password = $request->post('password');
        $telp = $request->post('telp');
        $nama_jasa = $request->post('nama_jasa');
        $nama_pemilik = $request->post('nama_pemilik');

        $data = DB::table('jasa')->insert([
            'email' => $email,
            'username' => $username,
            'telp' => $telp,
            'password' => Hash::make($password),
            'nama_jasa' => $nama_jasa,
            'nama_pemilik' => $nama_pemilik,
        ]);

        if ($data) {
            return redirect('/jasa/login')->with('message', 'berhasil mendaftar');
        }else{
            return back()->withInput();
        }
    }
    
    public function showPenyewa() {
        return view('auth/register-penyewa');
    }
    
    public function registerPenyewa(Request $request) {
        $email = $request->post('email');
        $username = $request->post('username');
        $password = $request->post('password');
        $telp = $request->post('telp');
        $first_name = $request->post('first_name');
        $last_name = $request->post('last_name');

        $data = DB::table('penyewa')->insert([
            'email' => $email,
            'username' => $username,
            'telp' => $telp,
            'password' => Hash::make($password),
            'first_name' => $first_name,
            'last_name' => $last_name,
        ]);

        if ($data) {
            return redirect('/penyewa/login');
        }else{
            return back()->withInput();
        }
    }

}
