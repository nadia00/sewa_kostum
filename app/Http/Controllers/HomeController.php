<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     return view('home');
    // }


    //

    public function showHome(){
        $kostum = $this->tampilKostum();
        return view('home')
        ->with('kostum',  $kostum);
    }

    public function tampilKostum(){
        $data = DB::table('KOSTUM AS KM')
            ->join('JASA AS JS', 'KM.ID_JASA','=','JS.ID')
            ->join('KATEGORI AS KI', 'KM.ID_KATEGORI','=','KI.ID')
            ->select('KM.ID AS id_kostum', 'JS.ID AS id_jasa', 'KM.NAMA AS nama_kostum',
                'KI.NAMA AS kategori','KM.HARGA AS harga', 'KM.STOK AS stok', 'JS.NAMA_JASA AS nama_jasa', 'JS.NAMA_PEMILIK AS nama_pemilik')
            ->get();
        $result = $this->getCostumes($data);
//        var_dump($result);
        return view('home')
            ->with('result', $result);
    }

    public function getCostumes($data){
        $result = array();
        foreach ($data as $val){
            $image = DB::table('GAMBAR')->where('ID_KOSTUM','=',"$val->id_kostum")->first();
            $final = [
                "id_kostum" => $val->id_kostum,
                "id_jasa" => $val->id_jasa,
                "nama_kostum" => $val->nama_kostum,
                "gambar" => $image->filepath,
                "kategori" => $val->kategori,
                "harga" => $val->harga,
                "stok" => $val->stok,
                "nama_jasa" => $val->nama_jasa
            ];
            array_push($result, $final);
        }
        return json_decode(json_encode($result), FALSE);
    }




}
