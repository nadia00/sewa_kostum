<?php

namespace App\Http\Controllers\AdminShop;

use App\Category;
use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\ProductSize;
use App\Shop;
use App\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ProductsController extends Controller
{
    public function index(){
        $shops = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        $product = Product::where('shop_id','=',$shops->id)
            ->paginate(9);
//            ->sortBy(['desc']);
//        dd($product);
        $sizes = Size::all();
        return view('admin/product/index')
            ->with('shops',$shops)
            ->with('product',$product)
            ->with('sizes',$sizes);
    }

    public function addIndex(){
        $shops = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        $category = Category::all();
        $sizes = Size::all();
        return view('admin/product/create')
            ->with('shops',$shops)
            ->with('sizes',$sizes)
            ->with('categories',$category);

    }

    public function addCreate(Request $request){
        $img_temp = [];
        $shop = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required'
        ]);
        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
            'shop_id'=>$shop->id
        ];
        print_r($request["price-".$request->size[0]]);
        if (sizeof($request->image) > 0){
            foreach ($request->image as $image){
                $file = $image->store('product');
//                $file = Image::make($image->getRealPath())->resize(300, 300)->store('product');
                array_push($img_temp, $file);

            }
            $data['image'] = $img_temp[0];
        }else{
            $data['image'] = "upload/default.jpg";
        }
        $product = Product::create($data);

        foreach ($img_temp as $image)
            ProductImage::create(['product_id'=>$product->id,'image' => $image]);

        if (sizeof($request->size)>0){
            foreach ($request->size as $size){
                ProductSize::create([
                    'product_id'=>$product->id,
                    'size_id'=>$size,
                    'price'=> $request['price-'.$size],
                    'quantity'=> $request['stock-'.$size],
                ]);
            }
        }
        if (sizeof($request->category) > 0){
            foreach ($request->category as $category){
                ProductCategory::create([
                    'product_id'=>$product->id,
                    'category_id'=>$category,
                ]);
            }
        }
        return redirect()->route('admin-shop.product');
    }

    public function deleteProduct($id_product){
        Product::where('id','=',$id_product)->delete();
        return redirect()->back();
    }

    public function editIndex($id){
        $product = Product::all()->where('id','=',$id)->first();
        $categories = Category::all();
        $sizes = Size::all();

        return view('admin/product/edit')
            ->with('product',$product)
            ->with('categories',$categories)
            ->with('sizes',$sizes);
    }


    public function editCreate(Request $request){
        $shop = Shop::all()->where('user_id','=',Auth::user()->id)->first();
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required'
        ]);
//        $data = [
//            'name'=>$request->name,
//            'description'=>$request->description,
//            'shop_id'=>$shop->id
//        ];

        Product::where('id','=',$request->product_id)
            ->update([
                'name'=>$request->name,
                'description'=>$request->description,
            ]);
        ProductSize::where('product_id','=',$request->product_id)
            ->where('product_size_id','=',productSize_id)
            ->where('size_id','=',size_id)
            ->update([
                'price'=>$request->price,
                'quantity'=>$request->quantity,
            ]);
//        ProductImage::created([
//
//        ]);


        return redirect()->route('admin-shop.product');
    }
    public function deleteImage($id){
        $product = DB::table('products as p')
            ->join('product_images as ip','ip.image','=','p.image')
            ->delete('p.image');

        ProductImage::where('id','=',$id)->delete();
        return redirect()->back();
    }



}
