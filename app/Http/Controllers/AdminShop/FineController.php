<?php

namespace App\Http\Controllers\AdminShop;

use App\Fine;
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

        $count_shop = FineShop::all()->where('shop_id','=',$shop->id)->count();

        if(sizeof($fineshop) == 0){
            return redirect()->route('admin-shop.fine-form');
        }else{
            if($count_shop != 0){
                return redirect()->route('admin-shop.fine');
            }else{
                return redirect()->route('admin-shop.fine-form');
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
        if (sizeof($request->type_id)>0) {
            foreach ($request->type_id as $type_id) {
                FineShop::create([
                   'shop_id'=>$request->shop_id,
                   'type_id'=>$type_id,
                   'price'=>$request['price-'.$type_id],
                ]);
            }
        }
        return redirect()->route('admin-shop.profile');
    }

    public function editIndex(){
        $shop = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        $fineshop = FineShop::all()->where('shop_id','=',$shop->id);
        $finetype = FineType::all();
        return view('admin/shop/fine')
            ->with('fineshop',$fineshop)
            ->with('shop_id',$shop->id)
            ->with('finetype',$finetype);
    }

    public function edit(Request $request){
        $shop = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        foreach ($request->type_id as $type){
            FineShop::where('shop_id','=',$shop->id)->where('type_id','=',$type)
                ->update([
                    'price'=>$request['price-'.$type],
                ]);
        }
        return redirect()->route('admin-shop.profile');
    }

    public function insertCount(Request $request){
        $shop = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        foreach ($request->type_id as $type_id){
            $total = ((int)$request["sum_product-$type_id"])*((int)$request["price-$type_id"]);
            $data =  [
                'shop_id'=>$shop->id,
                'order_id'=>$request->order_id,
                'type_id'=>$type_id,
                'sum_product'=>$request["sum_product-$type_id"],
                'total'=>$total,
            ];
            Fine::create($data);
        }
        dd($data);
        foreach ($request->type_id as $type_id){
        }

    }
}
