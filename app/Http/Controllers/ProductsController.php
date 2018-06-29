<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\ProductCategory;
use App\ProductSize;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function category($id){
        $products = ProductCategory::all()->where('category_id','=',id);
        return view('')->with('products',$products);
    }

    function detail($id){
        $categories = Category::all();
        $product = Product::all()->where('id','=',$id)->first();

        return view('product/detail')
            ->with('product',$product)
            ->with('categories',$categories);
    }

}
