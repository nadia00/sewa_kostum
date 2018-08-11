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
        $users = User::select('email')
            ->where('id', Auth::user()->id)->first();
        return view('admin/shop/create')->with('users',$users);
    }

    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'name' => 'required|max:255',
//            'country' => 'required',
            'province' => 'required',
            'city' => 'required',
            'street' => 'required',
//            'location_address' => 'required',
//            'location_lat'=>'required',
//            'location_lng'=>'required',
            'description' => 'required',
            'phone' => 'required',
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
            ->where('status','=','5');
        $orderProcess = Order::all()
            ->where('shop_id','=',$shop_id)
            ->whereIn('status',[1,2,3,4]);
        $orderReject = Order::all()
            ->where('shop_id','=',$shop_id)
            ->where('status','=','6');

        $countProduct = $data->products->count();
        $countOrderC = $orderConfirm->count();
        $countOrderP = $orderProcess->count();
        $countOrderR = $orderReject->count();

        return view('admin/shop/profil')
            ->with('data', $data)
            ->with('fineshop',$fineshop)
            ->with('countproduct',$countProduct)
            ->with('countOrderC',$countOrderC)
            ->with('countOrderP',$countOrderP)
            ->with('countOrderR',$countOrderR);
    }

    public function edit(){
        $shop = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        return view('admin/shop/profil-edit')->with('data', $shop);
    }

    public function editProfile(Request $request){
        $this->validate($request, ['pic'=>'image']);

        $file = $request->file('pic');
        if (!empty($file)) {
            $data['image'] = $file->store('shop');
        } else {
//            $data['image'] = asset('public/upload/default.jpg');
            $data['image'] = asset('public/page/img/shop.png');
        }

        Shop::where('id','=',$request->shop_id)
            ->update([
                'name'=>$request->name,
                'country'=>$request->country,
                'city'=>$request->city,
                'street'=>$request->street,
                'description'=>$request->description,
                'image'=>$data['image'],
                'phone'=>$request->phone,
            ]);

        return redirect()->route('admin-shop.profile');
    }

    public function editDeposit(Request $request){
        Shop::where('id','=',$request->shop_id)
            ->updated([
                'deposit'=>$request->deposit,
            ]);
    }



}
