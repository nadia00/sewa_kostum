<?php

namespace App\Http\Controllers;

use App\Address;
use App\Category;
use App\Order;
use App\OrderProduct;
use App\Shop;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    const STATUS_NEW = 0;
    const STATUS_CONFIRM = 1;
    const STATUS_SENDING = 2;
    const STATUS_RENTED = 3;
    const STATUS_RETURN = 4;
    const STATUS_DONE = 5;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function method(){
        $categories = Category::all();
        $address = Address::all()->where("user_id","=", Auth::user()->id);
        return view('order/method')->with("address",$address)->with("categories",$categories);
    }

    public function store(Request $request){
        $user = Auth::user()->id;
        $shop = Shop::all()->where('user_id','=',$user)->first();
        $cart = Cart::content();
        $order = Order::create([
            'user_id'=>$user,
            'addresses_id'=>$request->addresses_id,
            'shop_id'=>$shop->id,
            'status'=>self::STATUS_NEW
        ]);
        foreach ($cart as $val){
            OrderProduct::create([
                'order_id'=>$order->id,
                'product_size_id'=>$val->options->size,
                'price'=>$val->price,
                'quantity'=>$val->qty,
                'duration_in_days'=>$val->options->duration_in_days
            ]);
        }
        Cart::destroy();
        return redirect()->route('home');
    }
    //
}
