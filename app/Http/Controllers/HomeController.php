<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductCategory;
use App\ProductReview;
use http\Env\Request;
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
        $product = Product::all()->sortByDesc('created_at');
        $count = $product->count();

//        while ($product){
        for($i=0; $i<$count; $i++){
            $avg_review = [];
            $avg_review[$i] = DB::table('product_reviews')
                ->select(DB::raw('AVG(review_value) as average'))
                ->where('product_id', $product[$i]->id)
                ->get();
//            $result[$i] = $avg_review[$i];
//            $result_review[$i] = (int)$result[$i];
//            $rest_of_result[$i] = 5 - $result_review[$i];
        }

        dd($avg_review);

        return view('home')
            ->with('product',$product);
//            ->with('review_result', $result_review)
//            ->with('rest', $rest_of_result);
    }

    public function productCategory($id_category){
        $ctg=Category::all()->where('id','=',$id_category)->first();
        $ctgp = ProductCategory::all()->where('category_id','=',$ctg->id);
        return view('category')
            ->with('product',$ctgp)
            ->with('categories',$ctg);
    }

    public function allProduct($page = 0){
        $count = Product::all()->count();
        if ($page == 0){
            $product = Product::paginate(8);
            return view('all-product')
                ->with('product',$product)
                ->with('count',$count);
        }
        else{
            $product = Product::paginate($page);
            return response()->json(["product" => $product]);
        }

    }
}
