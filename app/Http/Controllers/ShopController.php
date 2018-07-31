<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\ProductReview;
use App\Shop;
use DateTime;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function viewShop($shop_id){
        $shop = Shop::where('id','=',$shop_id)->first();
        $countstar = ProductReview::where('shop_id',$shop_id)->get()->count();

        $star = [];
        $star_value = 0;
        for($i=0;$i<5;$i++){
            $star[$i] = ProductReview::where('shop_id',$shop_id)
                ->where('review_value',($i+1))->get()->count();
            $star_value += $star[$i] * ($i+1);
        }
        if($countstar != 0)
            $total_value = $star_value / $countstar;
        else
            $total_value = 0;


        $order = Order::where('shop_id','=',$shop_id)->get()->count();
        $date = date("Y-m-d");
        $date1 = date("Y-m-d", strtotime("-1 month"));
        $date3 = date("Y-m-d", strtotime("-3 month"));
        $date6 = date("Y-m-d", strtotime("-6 month"));

        $order1bln = Order::where('shop_id','=',$shop_id)
            ->whereBetween('created_at',[$date1,$date])
            ->get()
            ->count();
        $order3bln = Order::where('shop_id','=',$shop_id)
            ->whereBetween('created_at',[$date3,$date])
            ->get()
            ->count();
        $order6bln = Order::where('shop_id','=',$shop_id)
            ->whereBetween('created_at',[$date6,$date])
            ->get()
            ->count();

        return view('nyobak')
            ->with('shop',$shop)
            ->with('star_all',$countstar)
            ->with('star',$star)
            ->with('total_value',$total_value)
            ->with('order',$order)
            ->with('order1bln',$order1bln)
            ->with('order3bln',$order3bln)
            ->with('order6bln',$order6bln);
    }
}
