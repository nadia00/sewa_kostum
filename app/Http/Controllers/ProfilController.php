<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class ProfilController extends Controller
{
    public function showJasa(Request $request) {
        if(session('login')){
            $data = DB::select('select * from jasa where username=?', [session('username')]);
            return view('jasa.profil',['data'=>$data]);
        }else{
            return redirect('/jasa/login');
        }
    }

    public function showPenyewa(Request $request) {
        if(session('login')){
            $data = DB::select('select * from penyewa where username=?', [session('username')]);
            return view('penyewa.profil',['data'=>$data]);
        }else{
            return redirect('/penyewa/login');
        }
    }

    public function profilJasa(Request $request){
        $data = $request->session()->get('key');
        
        return \Illuminate\View\View::make('profil')->with('jasa', $data);
        
    }

    public function profilPenyewa(Request $request){
        $data = $request->session()->get('key');
        
        return \Illuminate\View\View::make('profil')->with('penyewa', $data);
        
    }
}
