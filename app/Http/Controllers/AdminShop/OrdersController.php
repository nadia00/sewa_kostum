<?php

namespace App\Http\Controllers\AdminShop;

use App\FineShop;
use App\Order;
use App\OrderProduct;
use App\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    const STATUS_NEW = 0;
    const STATUS_CANCEL = 1;
    const STATUS_CONFIRM = 2;
    const STATUS_SENDING = 3;
    const STATUS_RENTED = 4;
    const STATUS_RETURN = 5;
    const STATUS_DONE = 6;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user()->id;
        $shop = Shop::all()->where("user_id",'=',$user)->first();
        $orders = Order::all()->where("shop_id",'=',$shop->id);
        $fine = FineShop::all()->where('shop_id','=',$shop->id);
        return view("admin/order/index")
            ->with('orders', $orders)
            ->with('fine',$fine);
    }

    public function refresh(Request $request){
        $fine = new FineController();
        if($request->status == 5){
            $fine->insertCount($request);
        }
        Order::where("id",'=',$request->order_id)->update([
            "status"=>$request->status
        ]);

        return redirect()->back();
    }

}
