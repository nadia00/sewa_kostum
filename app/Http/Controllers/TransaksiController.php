<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controller\KostumController;

class TransaksiController extends Controller
{
    public function showPesan(){
        return view('pesan');
    }
    public function pesan(Request $request){
        $jumlah_sewa = $request->post('jumlah_sewa');
        $tgl_pakai = $request->post('tgl_pakai');
        $tgl_harus_kembali = $request->post('tgl_harus_kembali');

        DB::table('sewa')->insert([
            // 'id_jasa' => 
            // 'id_penyewa' => session('id'), 
            // 'tgl_sewa' => time(),
        ]);

        
    }
}
