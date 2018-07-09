<?php

namespace App\Http\Controllers;

//use App\Models\Sewa;
//use App\Models\DetailSewa;
//use App\Models\Toko;
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
        return redirect()->back();
    }

    //order baru
    public function getOrder(){

    }

    //order yg sudah dikonfirm
    public function getOrderTerima(){

    }
    public function getOrderTolak(){

    }

    //konfirmasi order
    public function terimaOrder(){

    }
    public function tolakOrder(){

    }
}
