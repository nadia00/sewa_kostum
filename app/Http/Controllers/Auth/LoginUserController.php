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
    
    public function loginJasa(Request $request){
        $email = $request->post('email');
        $password = $request->post('password');
        
        $query = DB::table('jasa')->where('email', $email);        
        if($query->count()){
            $data = $query->first();
            if(Hash::check($password, $data->password)){
                session([
                    'id' => $data->id,
                    'email' => $data->email,
                    'userame' => $data->username,
                    'login' => true,
                    'states' => 'jasa',
                ]);
            }
        }
       return redirect('/jasa');
    }
    
    public function showPenyewa() {
        return view('auth/login-penyewa');
    }
    
    public function loginPenyewa(Request $request){
        $email = $request->post('email');
        $password = $request->post('password');
        
        $query = DB::table('penyewa')->where('email', $email)->first();
        if(Hash::check($password, $query->password)){
            session([
                'id' => $query->id,
                'email' => $query->email,
                'userame' => $query->username,
                'login' => true,
                'states' => 'jasa',
            ]);
        }   
        return redirect('/penyewa');
        
    }
}
