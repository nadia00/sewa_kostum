<?php

namespace App\Http\Controllers\AdminShop;

use App\Http\Controllers\Controller;
use App\Role;
use App\Shop;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
    public function create(){
        $types = Type::all();
        $users = User::select('email')
            ->where('id', Auth::user()->id)->first();
        return view('admin/shop/create')->with('types',$types)->with('users',$users);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'type_id' => 'required|numeric',
            'city' => 'required',
            'district' => 'required',
            'country' => 'required',
            'description' => 'required',
            'photo' => 'image'
        ]);
        $user = Auth::user()->id;
        $data = $request->all();
        $data['status'] = 0;
        $data['user_id'] = $user;
        $file = $request->file('photo');
        if (!empty($file)) {
            $data['image'] = $file->store('shop');
        } else {
            $data['image'] = asset('public/upload/default.jpg');
        }
        Shop::create($data);
        $role = Role::find(3)->id;
        DB::table('role_user')->where('user_id','=',$user)->delete();
        DB::table('role_user')->insert(['user_id'=>$user, 'role_id'=>$role]);
        return redirect()->route('admin-shop.product');
    }

    public function profile(){
        $user = Auth::user()->id;
        $data = Shop::all()->where('user_id','=',$user);
        return $data;//Kirim Ke Blade Untuk Toko Profil
    }
}
