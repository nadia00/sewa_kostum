<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
<<<<<<< HEAD
use App\ProductCategory;
use http\Env\Request;
=======
>>>>>>> 48e35bfb1baf557eafa08c0e4523c3a5233cdaeb

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

<<<<<<< HEAD
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
=======
//    public function getAllCostumes(){
//        $result = array();
//        $data = DB::table('KOSTUM AS KM')
//            ->leftJoin('DETAIL_KOSTUM AS DK', 'DK.ID_KOSTUM', '=', 'KM.ID')
//            ->join('TOKO AS TK', 'KM.ID_TOKO','=','TK.ID')
//            ->join('KOSTUM_KATEGORI AS KK', 'KK.ID_KOSTUM','=','KM.ID')
//            ->select(DB::raw('DISTINCT KM.id'),'KM.ID AS id_kostum','TK.ID AS id_toko', 'KM.NAMA AS nama_kostum', 'TK.NAMA AS nama_toko')
//            ->get();
//        if (sizeof($data) != 0){
//            foreach ($data as $val){
//                $image = DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM','=',"$val->id_kostum")->first();
//                $final = [
//                    "id_kostum" => $val->id_kostum,
//                    "id_toko" => $val->id_toko,
//                    "nama_toko" => $val->nama_toko,
//                    "nama_kostum" => $val->nama_kostum,
//                    "gambar_kostum" => $image->filepath,
//                ];
//                array_push($result, $final);
//            }
//            return view('home')->with('data',json_decode(json_encode($result)));
//        }else{
//            return view('home');
//        }
//    }
//
//    public function getLatestCostumes(){
//        $result = array();
//        $data = DB::table('KOSTUM AS KM')
//            ->join('DETAIL_KOSTUM AS DK', 'DK.ID_KOSTUM', '=', 'KM.ID')
//            ->join('TOKO AS TK', 'KM.ID_TOKO','=','TK.ID')
//            ->join('KOSTUM_KATEGORI AS KK', 'KK.ID_KOSTUM','=','KM.ID')
//            ->select('KM.ID AS id_kostum','TK.ID AS id_toko', 'KM.NAMA AS nama_kostum')
//            ->groupBy('KM.CREATED_AT')
//            ->get();
//        if (sizeof($data) != 0){
//            foreach ($data as $val){
//                $image = DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM','=',"$val->id_kostum")->first();
//                $final = [
//                    "id_kostum" => $val->id_kostum,
//                    "id_toko" => $val->id_toko,
//                    "nama_kostum" => $val->nama_kostum,
//                    "gambar_kostum" => $image->filepath,
//                ];
//                array_push($result, $final);
//            }
//            return view('home')->with('data',json_decode(json_encode($result)));
//        }else{
//            return view('home');
//        }
//    }



>>>>>>> 48e35bfb1baf557eafa08c0e4523c3a5233cdaeb
}
