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

    function dateRange( $first, $last, $step = '+1 day', $format = 'Y/m/d' ) {
        $dates = array();
        $current = strtotime( $first );
        $last = strtotime( $last );

        while( $current <= $last ) {

            $dates[] = date( $format, $current );
            $current = strtotime( $step, $current );
        }
        return $dates;
    }

    public function method(){
        $categories = Category::all();
        $address = Address::all()->where("user_id","=", Auth::user()->id);
        return view('order/method')->with("address",$address)->with("categories",$categories);
    }

    public function store(Request $request){
        $temp = 0;
        $user = Auth::user()->id;
        $cart = Cart::content()->groupBy('options.id_shop');

        $days = $this->dateRange($request->first_date, $request->last_date);

        foreach ($cart as $data) {
            foreach ($data as $val) {
                if ($temp != $val->options->id_shop) {
                    $order = Order::create([
                        'user_id' => $user,
                        'addresses_id' => $request->addresses_id,
                        'first_date' => $request->first_date,
                        'last_date' => $request->last_date,
                        'shop_id' => $val->options->id_shop,
                        'status' => self::STATUS_NEW
                    ]);
                    $temp = $val->options->id_shop;
                }
//                dd($val);
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_size_id' => $val->options->size,
                    'price' => $val->price,
                    'quantity' => $val->qty,
                ]);

            }
        }
        Cart::destroy();
        return redirect()->route('home');
    }
    //
}
