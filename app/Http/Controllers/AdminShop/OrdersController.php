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
    const STATUS_CONFIRM = 1;
    const STATUS_SENDING = 2;
    const STATUS_RENTED = 3;
    const STATUS_RETURN = 4;
    const STATUS_DONE = 5;
    const STATUS_CANCEL = 6;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user()->id;
        $shop = Shop::all()->where("user_id",'=',$user)->first();
        $orders = Order::all()->where("shop_id",'=',$shop->id);
        $fine = FineShop::all()->where('shop_id','=',$shop->id);

        $deposit = new ReturnController();
        $deposit->getDenda($shop->id);

        $new = $orders->where('status','=','0');
        $process = $orders->whereIn('status',[2,3,1]);
        $return = $orders->whereIn('status',4);
        $done = $orders->where('status','=','5');
        return view("admin/order/index")
            ->with('orders', $orders)
            ->with('fine',$fine)
            ->with('new',$new)
            ->with('process',$process)
            ->with('return',$return)
            ->with('done',$done);
    }

    public function rekap(){
        $user = Auth::user()->id;
        $shop = Shop::all()->where("user_id",'=',$user)->first();
        $orders = Order::all()->where("shop_id",'=',$shop->id);



        return view('admin.order.rekap')
            ->with('orders',$orders);
    }

    public function refresh(Request $request){
        $fine = new FineController();
        if($request->status == 4 && !empty($request->type_id)){
            $fine->insertCount($request);
        }
        if ($request->status == self::STATUS_RETURN)
            Order::where("id",'=',$request->order_id)->update(["status"=>$request->status,"date_return"=>date("Y-m-d H:i:s")]);
        else
            Order::where("id",'=',$request->order_id)->update(["status"=>$request->status]);
        return redirect()->back();
    }

}
