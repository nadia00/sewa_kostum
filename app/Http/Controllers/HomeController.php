<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductCategory;
use http\Env\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('home')->with('product',$product);
    }

    public function productCategory($id_category){
        $ctg=Category::all()->where('id','=',$id_category)->first();
        $ctgp = ProductCategory::all()->where('category_id','=',$ctg->id);
        return view('category')
            ->with('product',$ctgp)
            ->with('categories',$ctg);
    }

    public function allProduct(){
        $product = Product::all();
        return view('home')->with('product',$product);
    }
}
