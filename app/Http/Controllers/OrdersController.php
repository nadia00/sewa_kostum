<?php

namespace App\Http\Controllers;

use App\Address;
use App\Category;
use App\Order;
use App\OrderProduct;
use App\Shop;
//use Gloudemans\Shoppingcart\Facades\Cart;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function method(){
        $categories = Category::all();
        $address = Address::all()->where("user_id","=", Auth::user()->id);
        $cart = Cart::getContent()->groupBy('attributes.id_shop');

        return view('order/method')->with("address",$address)
            ->with("categories",$categories)
            ->with("carts",$cart);
    }

    public function store(Request $request){
        $temp = 0;
        $order_id = 0;
        $price = 0;
        $user = Auth::user()->id;
        $cart = Cart::getContent()->groupBy('attributes.id_shop');

        $price = $request->tot;
        $date = date("ymdHms");
        $transaction = array(
            "order_id" => "Order" . "-" .$order_id.$date,
            "gross_amount" => $price
        );

        $body = array(
            "transaction_details" => $transaction
        );

        $headers = array(
            'Authorization' => 'Basic U0ItTWlkLXNlcnZlci1ETS1ZX2VnalNQTDQ1Z29MTUFZVGczSVQ6Og==',
            'Content-Type'  => 'application/json',
            'Accept'        =>'application/json'
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://app.sandbox.midtrans.com/snap/v1/transactions",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Basic U0ItTWlkLXNlcnZlci1ETS1ZX2VnalNQTDQ1Z29MTUFZVGczSVQ6Og==",
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: 0ebfe712-65e0-fe37-b632-60161c922d01"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $json = json_decode($response);


        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            foreach ($cart as $data) {
                foreach ($data as $val) {
                    $shop_deposit = Shop::getDeposit($val->attributes->id_shop);
                    if ($temp != $val->attributes->id_shop) {
                        if (empty($shop_deposit)){
                            $shop_deposit = 0;
                        }
                        $order = Order::create([
                            'user_id' => $user,
                            'addresses_id' => $request->addresses_id,
                            'first_date' => $request->first_date,
                            'shop_id' => $val->attributes->id_shop,
                            'status' => self::STATUS_NEW,
                            'deposit'=> $shop_deposit,
                        ]);
                        $temp = $val->attributes->id_shop;
                    }
                    $order_id = $order->id;
                    OrderProduct::create([
                        'order_id' => $order->id,
                        'product_size_id' => $val->attributes->size,
                        'price' => $val->price,
                        'quantity' => $val->quantity,
                    ]);

//                $sum += $sum * Shop::getDeposit($val->attributes->id_shop) / 100;
                }
            }


            foreach ($cart as $val)
                Cart::clear();

            return Redirect::to($json->redirect_url);
        }

    }

    public function list(){
        $user = Auth::user()->id;
        $orders = Order::all()->where("user_id",'=',$user);

        $new = $orders->where('status','=','0');
        $process = $orders->whereIn('status',[2,3,1]);
        $return = $orders->whereIn('status',4);
        $done = $orders->where('status','=','5');

        return view("order/history")
            ->with('orders', $orders)
            ->with('new',$new)
            ->with('process',$process)
            ->with('return',$return)
            ->with('done',$done);
    }

}
