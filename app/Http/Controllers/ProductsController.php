<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\ProductCategory;
use App\ProductReview;
use App\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    function category($id, $page = 0){
        if ($page == 0){
            $products = ProductCategory::all()->where('category_id','=',id);
            $product = $products::paginate(6);
//            $product = Product::paginate(6);
            return view('products')->with('products',$product);
        }
        else{
            $products = ProductCategory::all()->where('category_id','=',id);
            $product = $products::paginate(6);
//            $product = Product::paginate($page);
            return response()->json(["product" => $product]);
        }
    }

    function detail($id){
        $categories = Category::all();
        $product = Product::all()->where('id','=',$id)->first();

        $avg_review = DB::table('product_reviews')
            ->select(DB::raw('AVG(review_value) as average'))
            ->where('product_id', $id)
            ->get();

        $result = $avg_review[0]->average;
        $result_review = (int)$result;
        $rest_of_result = 5 - $result_review;

        if(Auth::user() != null){
            $user_id = Auth::user()->id;

            $review = 0;
            $cek_review = DB::table('product_reviews')
                ->where('user_id', Auth::user()->id)
                ->where('product_id', $id)
                ->get();
            $cek = count($cek_review);

            if ($cek != 0) $review = 1; else $review = 0;

            $order = Order::all()->where('user_id','=',$user_id);
            if(sizeof($order) == 0)
                $status_order = 0;
            else{
                $user_order = DB::table('orders as o')
                    ->join('order_products as op','op.order_id','=','o.id')
                    ->join('product_sizes as pz','pz.id','=','op.product_size_id')
                    ->join('products as p','p.id','=','pz.product_id')
                    ->where('p.id','=',$id)
                    ->get();

                if (sizeof($user_order) != 0)
                    $status_order = 1;
                else
                    $status_order = 0;
            }
        }
        else{
            $status_order = 0;
            $review = 0;
        }

        return view('product/detail')
            ->with('product',$product)
            ->with('categories',$categories)
            ->with('review', $review)
            ->with('review_result', $result_review)
            ->with('rest', $rest_of_result)
            ->with('status_order',$status_order);
    }

}
