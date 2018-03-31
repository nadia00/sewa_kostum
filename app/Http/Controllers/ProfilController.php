<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    public function showJasa(Request $request) {
        if($request->session()->has('jasa')){
            return view('jasa.profil');
        }else{
            return redirect('/jasa/login');
        }
    }
    
    public function profilJasa(Request $request){
        $data = $request->session()->get('key');
        
        return \Illuminate\View\View::make('profil')->with('jasa', $data);
        
    }
}
