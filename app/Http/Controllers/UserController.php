<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return $this->getMyProfile();;
    }

    public function address(Request $request){
        Address::create([
            'user_id'=> Auth::user()->id,
            'city'=> $request->city,
            'country'=>"Indonesia",
            'district'=>$request->district,
            'street'=>$request->street,
            'zip_code'=>$request->zip_code,
            'phone_number'=>$request->phone_number
        ]);
        return redirect()->back();
    }


    public function getMyProfile(){
        $data = User::with('shop')->where('id', '=', Auth::user()->id)->first();
        return view('profil')->with('data', $data);
    }

    
}
