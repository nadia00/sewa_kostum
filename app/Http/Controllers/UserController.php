<?php

namespace App\Http\Controllers;

use App\Address;
use App\Shop;
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

    public function edit(){
        $user = User::all()->where('id','=',Auth::user()->id)->first();
        return view('profil-edit')
            ->with('data', $user);
    }
    public function editProfile(Request $request){
        $this->validate($request, ['avatar'=>'image']);

        $file = $request->file('avatar');
        if (!empty($file)) {
            $data['image'] = $file->store('user');
        } else {
            $data['image'] = asset('public/upload/default.jpg');
        }

        User::where('id','=',Auth::user()->id)
                ->update([
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'phone_number'=>$request->phone_number,
                    'date_of_birth'=>$request->date_of_birth,
                    'avatar'=>$request->avatar,
                ]);
        return redirect()->route('home');
    }
}
