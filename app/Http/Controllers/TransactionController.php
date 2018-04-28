<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use App\Models\DetailSewa;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function addTransaction(Request $request){
        $data = Sewa::create($request->all());        
        $detail = DetailSewa::create([
            'id_sewa' => $data->id,
            'id_kostum' => $request->post('id_kostum'),
            'jumlah_sewa' =>$request->post('jumlah_sewa'),
            'pemakaian' => $request->post('pemakaian'),
            'lama_pemakaian' => $request->post('lama_pemakaian'),
            'tenggang_kembali' => date('Y-m-d'),
            ]);
    }

    public function getOrder(){
        $result = array();
        $data = DB::table('SEWA AS S')
            ->join('TOKO AS TK', 'S.ID_TOKO','=','TK.ID')
            ->join('DETAIL_SEWA AS DS', 'S.ID','=','DS.ID_SEWA')
            ->join('USERS AS U', 'S.ID_PENYEWA','=','U.ID')
            ->join('KOSTUM AS K', 'DS.ID_KOSTUM','=','K.ID' )
            ->select('S.ID AS id_sewa','TK.ID AS id_toko', 'U.ID AS id_penyewa', 'K.ID AS id_kostum',
                'U.FULLNAME AS nama_penyewa','DS.CREATED_AT AS tanggal_sewa','K.NAMA AS nama_kostum')
            ->where('TK.ID','=',Toko::all()->firstWhere('id_penjual','=',Auth::user()->id)->id)
            ->get();
        // return view('shop/order-list')->with('data',json_decode($data));
        if (sizeof($data) != 0){
            foreach ($data as $val){
                $image = DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM','=',"$val->id_kostum")->first();
                $final = [
                    "id_sewa" => $val->id_sewa,
                    "id_toko" => $val->id_toko,
                    "id_penyewa" => $val->id_penyewa,
                    "id_kostum" => $val->id_kostum,
                    "nama_penyewa" => $val->nama_penyewa,
                    "tanggal_sewa" => $val->tanggal_sewa,
                    "nama_kostum" => $val->nama_kostum,
                    "gambar_kostum" => $image->filepath,
                ];
                array_push($result, $final);
            }
            return view('shop/order-list')->with('data',json_decode(json_encode($result)));
        }else{
            return view('shop/order-list');
        }
    }

    public function getDetailOrder($id_sewa){
        $data = DB::table('SEWA AS S')
            ->join('TOKO AS TK', 'S.ID_TOKO','=','TK.ID')
            ->join('DETAIL_SEWA AS DS', 'S.ID','=','DS.ID_SEWA')
            ->join('USERS AS U', 'S.ID_PENYEWA','=','U.ID')
            ->join('KOSTUM AS K', 'DS.ID_KOSTUM','=','K.ID' )
            ->select('S.ID AS id_sewa','TK.ID AS id_toko', 'U.ID AS id_penyewa', 'K.ID AS id_kostum',
                'U.FULLNAME AS nama_penyewa','DS.CREATED_AT AS tanggal_sewa','K.NAMA AS nama_kostum',
                'DS.JUMLAH_SEWA AS jumlah_sewa','DS.PEMAKAIAN AS tanggal_pemakaian','DS.LAMA_PEMAKAIAN AS lama_pemakaian')
            ->where('S.ID','=',$id_sewa)
            ->get();
            
        $final = [
            "id_sewa" => $data[0]->id_sewa,
            "id_toko" => $data[0]->id_toko,
            "id_penyewa" => $data[0]->id_penyewa,
            "id_kostum" => $data[0]->id_kostum,
            "nama_penyewa" => $data[0]->nama_penyewa,
            "tanggal_sewa" => $data[0]->tanggal_sewa,
            "nama_kostum" => $data[0]->nama_kostum,
            "jumlah_sewa" => $data[0]->jumlah_sewa,
            "tanggal_pemakaian" => $data[0]->tanggal_pemakaian,
            "lama_pemakaian" => $data[0]->lama_pemakaian,
            "gambar_kostum" => array(),
        ];
        $image =  DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM','=',$data[0]->id_kostum)->get();
        foreach ($image as $val){
            array_push($final['gambar_kostum'], array('filepath' => $val->filepath));
        }
        return view('shop/order-detail')->with('data',json_decode(json_encode($final)));
    }
}