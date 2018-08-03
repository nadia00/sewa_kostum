<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Shop;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->sortByDesc('created_at');

        $avg_review = DB::table('product_reviews')
            ->select('product_id', DB::raw('AVG(review_value) as average'))
            ->groupBy('product_id')
            ->get();

        $reviews = array();
        foreach ($products as $product){
            $cek = 0;
            foreach ($avg_review as $item) {
                if ($product->id == $item->product_id){
                    $result = $item->average;
                    $result_review = (int)$result;
                    $rest_of_result = 5 - $result_review;
                    array_push($reviews, [
                        'product_id' => $product->id,
                        'review' => $result_review,
                        'rest_review' => $rest_of_result,
                    ]);
                    $cek = 1;
                    continue;
                }
            }
            if ($cek == 0){
                $result_review = 0;
                $rest_of_result = 5 - $result_review;
                array_push($reviews, [
                    'product_id' => $product->id,
                    'review' => $result_review,
                    'rest_review' => $rest_of_result,
                ]);
            }
        }
        return view('home')
            ->with('product',$products)
            ->with('reviews', $reviews);

    }

    public function productCategory($id_category, Request $req, $page = 1, $show = 0){
        $ctg = Category::all()->where('id','=',$id_category)->first();
        $productCtg = ProductCategory::where('category_id','=',$ctg->id);
        $count = $productCtg->count();
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            $product = $productCtg->paginate($req->show);
            return response()->json([
                "product" => $product,
                'show' => $req->show,
                'page'=> $req->page
            ]);
        }
        elseif ($req->show == 0){
            $product = $productCtg->paginate(8);
            return view('product.category')
                ->with('ctg',$ctg)
                ->with('product',$product)
                ->with('count',$count);
        }
        else{
            $product = $productCtg->paginate($req->show);
            return view('product.category')
                ->with('ctg',$ctg)
                ->with('product',$product)
                ->with('count',$count);
        }
    }
    public function filterCategory($id_category, Request $request){
        $ctg = Category::all()->where('id','=',$id_category)->first();
//        $productCtg = ProductCategory::where('category_id','=',$ctg->id);

        $shopsArr = array();
        $kotaArr = array();
        foreach ($request->kota as $kota){
            $shops = DB::table('shops')
                ->where('location_address', 'like', '%'.$kota.'%')
                ->get();

            array_push($kotaArr, $kota);

            foreach ($shops as $shop){
                array_push($shopsArr, $shop);
            }
        }
        $idShop = array();
        foreach ($shopsArr as $item){
            array_push($idShop, $item->id);
        }

        $products = DB::table('products as p')
            ->join('product_categories as pc','pc.product_id','=','p.id')
            ->whereIn('shop_id', $idShop)
            ->whereIn('category_id',$ctg->id)
            ->get();


        return view('product.product')
            ->with('products',$products)
            ->with('kota',$kotaArr);
    }


    public function allProduct(Request $req, $page = 1, $show = 0){
        $count = Product::all()->count();
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            $product = Product::paginate($req->show);
            return response()->json([
                "product" => $product,
                'show' => $req->show,
                'page'=> $req->page
            ]);
        }
        else{
//            dd($req);
        }
        if ($req->show == 0){
            $product = Product::paginate(8);
            return view('product.all-product')
                ->with('product',$product)
                ->with('count',$count);
        }
        else{
            $product = Product::paginate($req->show);
            return view('product.all-product')
                ->with('product',$product)
                ->with('count',$count);
        }
    }

    public function filter(Request $request){
        $shopsArr = array();
        $kotaArr = array();
        foreach ($request->kota as $kota){
            $shops = DB::table('shops')
                ->where('location_address', 'like', '%'.$kota.'%')
                ->get();

            array_push($kotaArr, $kota);

            foreach ($shops as $shop){
                array_push($shopsArr, $shop);
            }
        }
        $idShop = array();
        foreach ($shopsArr as $item){
            array_push($idShop, $item->id);
        }

        $products = DB::table('products')
            ->whereIn('shop_id', $idShop)
            ->get();


        return view('product.product')
            ->with('products',$products)
            ->with('kota',$kotaArr);
    }



}
