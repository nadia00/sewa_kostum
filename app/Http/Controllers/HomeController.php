<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getAllCostumes();
    }

    public function getAllCostumes(){
        $result = array();
        $data = DB::table('KOSTUM AS KM')
            ->join('TOKO AS TK', 'KM.ID_TOKO','=','TK.ID')
            ->join('KATEGORI AS KI', 'KM.ID_KATEGORI','=','KI.ID')
            ->where('KM.JUMLAH_STOK','>',0)
            ->select('KM.ID AS id_kostum','TK.ID AS id_toko', 'KM.NAMA AS nama_kostum',
                'KI.NAMA AS kategori','KM.HARGA AS harga','KM.JUMLAH_STOK AS stok')
            ->get();
        if (sizeof($data) != 0){
            foreach ($data as $val){
                $image = DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM','=',"$val->id_kostum")->first();
                $final = [
                    "id_kostum" => $val->id_kostum,
                    "id_toko" => $val->id_toko,
                    "nama_kostum" => $val->nama_kostum,
                    "gambar_kostum" => $image->filepath,
                    "kategori" => $val->kategori,
                    "harga" => $val->harga,
                    "stok" => $val->stok,
                ];
                array_push($result, $final);
            }
            return view('home')->with('data', json_decode(json_encode($result)));
        }else{
            return view('home');
        }
    }

}
