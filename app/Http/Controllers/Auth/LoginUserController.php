<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class LoginUserController extends Controller
{
    public function showJasa() {
        return view('auth/login-jasa');
    }
    
    public function loginJasa(Request $request, $id){
        $email = $request->post('email');
        $password = $request->post('password');
        
        $query = DB::table('jasa')->where('email', $email)->first();
        
        
        if(Hash::check($password, $query->password)){
            return redirect('/jasa');
        }
    }
    
    public function showPenyewa() {
        return view('auth/login-penyewa');
    }
    
    public function loginPenyewa(Request $request){
        $email = $request->post('email');
        $password = $request->post('password');
        
        $query = DB::table('penyewa')->where('email', $email)->first();
        if(Hash::check($password, $query->password)){
            return redirect('/penyewa');
        }
    }
    
}
