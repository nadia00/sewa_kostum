<?php

namespace App\Http\Controllers\AdminShop;

use App\FineType;
use App\Shop;
use App\FineShop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cek(){
        $user_id = Auth::user()->id;
        $shop = Shop::all()->where('user_id','=',$user_id)->first();
        $fineshop = FineShop::all();
//        $count = $fineshop->count();

        if(sizeof($fineshop) == 0){
            return redirect()->route('admin-shop.fine');
        }else{
            if($shop->id != $fineshop->shop_id){
                return redirect()->route('admin-shop.fine');
            }else{
                return redirect()->route('admin-shop.fine-edit');
            }
        }
    }

    public function index(){
        $user_id = Auth::user()->id;
        $shop = Shop::all()->where('user_id','=',$user_id)->first();
        $finetype = FineType::all();

        return view('admin/shop/fine-add')
            ->with('shop_id',$shop->id)
            ->with('finetype',$finetype);
    }

    public function insert(Request $request){
//        dd($request);

        if (sizeof($request->type_id)>0) {
            $i = 0;
            foreach ($request->type_id as $type_id) {
                FineShop::create([
                   'shop_id'=>$request->shop_id,
                   'type_id'=>$type_id[$i],
                   'price'=>$request->price[$i],
                ]);
                $i++;
            }
        }
        return redirect()->route('admin-shop.profile');
    }

    public function editIndex(){
        $user_id = Auth::user()->id;
        $shop_id = Shop::all()->where('id','=',$user_id);
        $fineshop = FineShop::all()->where('shop_id','=',$shop_id);
//        dd($fineshop);

        return view('admin/shop/fine')
            ->with('data',$fineshop)
            ->with('shop_id',$shop_id);
    }

    public function edit(){

    }

}
