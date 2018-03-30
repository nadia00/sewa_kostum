<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function showProfilJasa() {
        return view('jasa/profil-jasa');
    }
    
    
}
