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
            ->leftJoin('DETAIL_KOSTUM AS DK', 'DK.ID_KOSTUM', '=', 'KM.ID')
            ->join('TOKO AS TK', 'KM.ID_TOKO','=','TK.ID')
            ->join('KOSTUM_KATEGORI AS KK', 'KK.ID_KOSTUM','=','KM.ID')
            ->select(DB::raw('DISTINCT KM.id'),'KM.ID AS id_kostum','TK.ID AS id_toko', 'KM.NAMA AS nama_kostum', 'TK.NAMA AS nama_toko')
            ->get();
        if (sizeof($data) != 0){
            foreach ($data as $val){
                $image = DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM','=',"$val->id_kostum")->first();
                $final = [
                    "id_kostum" => $val->id_kostum,
                    "id_toko" => $val->id_toko,
                    "nama_toko" => $val->nama_toko,
                    "nama_kostum" => $val->nama_kostum,
                    "gambar_kostum" => $image->filepath,
                ];
                array_push($result, $final);
            }
            return view('home')->with('data',json_decode(json_encode($result)));
        }else{
            return view('home');
        }
    }

    public function getLatestCostumes(){
        $result = array();
        $data = DB::table('KOSTUM AS KM')
            ->join('DETAIL_KOSTUM AS DK', 'DK.ID_KOSTUM', '=', 'KM.ID')
            ->join('TOKO AS TK', 'KM.ID_TOKO','=','TK.ID')
            ->join('KOSTUM_KATEGORI AS KK', 'KK.ID_KOSTUM','=','KM.ID')
            ->select('KM.ID AS id_kostum','TK.ID AS id_toko', 'KM.NAMA AS nama_kostum')
            ->groupBy('KM.CREATED_AT')
            ->get();
        if (sizeof($data) != 0){
            foreach ($data as $val){
                $image = DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM','=',"$val->id_kostum")->first();
                $final = [
                    "id_kostum" => $val->id_kostum,
                    "id_toko" => $val->id_toko,
                    "nama_kostum" => $val->nama_kostum,
                    "gambar_kostum" => $image->filepath,
                ];
                array_push($result, $final);
            }
            return view('home')->with('data',json_decode(json_encode($result)));
        }else{
            return view('home');
        }
    }



}
