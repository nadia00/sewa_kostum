<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LogoutUserController extends Controller
{
    public function logout(Request $request){
        
        Session::flush();
        
        return redirect('/homeshop');
    }
}
