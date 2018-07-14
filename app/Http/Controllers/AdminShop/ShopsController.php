<?php

namespace App\Http\Controllers\AdminShop;

use App\Http\Controllers\Controller;
use App\Order;
use App\Role;
use App\Shop;
use App\Type;
use App\User;
use App\FineShop;
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
        $data = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        $shop_id = $data->id;

        $shop = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        $fineshop = FineShop::all()->where('shop_id','=',$shop->id);

        $orderConfirm = Order::all()
            ->where('shop_id','=',$shop_id)
            ->where('status','=','1');
        $orderReject = Order::all()
            ->where('shop_id','=',$shop_id)
            ->where('status','=','0');

        $countProduct = $data->products->count();
        $countOrderC = $orderConfirm->count();
        $countOrderR = $orderReject->count();

        return view('admin/shop/profil')
            ->with('data', $data)
            ->with('fineshop',$fineshop)
            ->with('countproduct',$countProduct)
            ->with('countOrderC',$countOrderC)
            ->with('countOrderR',$countOrderR);
    }

    public function edit(){
        $shop = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        return view('admin/shop/profil-edit')->with('data', $shop);
    }

    public function editProfile(){

    }
}
