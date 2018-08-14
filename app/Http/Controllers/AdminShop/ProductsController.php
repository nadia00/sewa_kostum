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
        $img_temp = [];

        Product::where('id','=',$request->product_id)
            ->update([
                'name'=>$request->name,
                'description'=>$request->description,
            ]);

        if (sizeof($request->image) > 0){
            foreach ($request->image as $image){
                $file = $image->store('product');
                array_push($img_temp, $file);
            }
            $data['image'] = $img_temp[0];
        }else{
            $data['image'] = "upload/default.jpg";
        }
        foreach ($img_temp as $image)
            ProductImage::create(['product_id'=>$request->product_id,'image' => $image]);


        return redirect()->back();
    }

    public function editSize(Request $request){
        foreach ($request->update as $update){
            ProductSize::where('product_id','=',$request->product_id)
                ->where('id','=',$update['id'])
                ->where('size_id','=',$update['size_id'])
                ->update([
                    'price'=>$update['price'],
                    'quantity'=>$update['quantity'],
                ]);
        }

        return redirect()->back();
    }

    public function addSize(Request $request){
        ProductSize::create([
            'product_id'=>$request->product_id,
            'size_id'=>$request->size_id,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
        ]);
        return redirect()->back();
    }

    public function deleteSize($id){
        ProductSize::where('id','=',$id)->delete();
        return redirect()->back();
    }

    public function deleteImage($id){
        ProductImage::where('id','=',$id)->delete();
        return redirect()->back();
    }

    public function updatMainImage($id, $image_id){
        $image = ProductImage::all()->where('id','=',$image_id)->first();

        Product::where('id','=',$id)->update([
            'image'=>$image->image
        ]);
        return redirect()->back();
    }
}
