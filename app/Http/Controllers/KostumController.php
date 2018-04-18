<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\uploadKostum;
use App\Kostum;
use App\Gambar;

class KostumController extends Controller
{
    
    public function showTambahKostum(){
        return view('jasa.kostum-tambah');
    }
    public function showEditKostum(){
        return view('jasa.kostum-edit');
    }

    public function uploadKostum(UploadKostum $request){
        $kostum = Kostum::create($request->all());
        // Making counting of uploaded images
        $file_count = count($request->gambar);
        var_dump($file_count);
        foreach($request->gambar as $gambar) {
            $filepath = $gambar->store('gambar');
            $filename = $gambar->getClientOriginalName();
            $filesize = $gambar->getClientSize();
            $filetype = $gambar->getClientOriginalExtension();
            Gambar::create([
                'id_kostum' => $kostum->id,
                'filename' => $filename,
                'size' => $filesize,
                'filepath' => $filepath,
                'tipe' => $filetype
            ]);

        }

        // foreach ($request->gambar as $gambar) {
        //     $image = $gambar;
        // }
        // return redirect('jasa/kostum');
    }
    public function editKostum(Request $request){
        

    }


    public function showKostumJasa(){
        $kostum = $this->tampilKostum();
        // var_dump($data);
        return view('jasa.kostum')
        ->with('kostum', $kostum);
    }

    public function tampilKostum(){
        $data = DB::table('KOSTUM AS KM')
            ->join('JASA AS JS', 'KM.ID_JASA','=','JS.ID')
            ->join('KATEGORI AS KI', 'KM.ID_KATEGORI','=','KI.ID')
            ->select('KM.ID AS id_kostum', 'JS.ID AS id_jasa', 'KM.NAMA AS nama_kostum',
                'KI.NAMA AS kategori','KM.HARGA AS harga', 'KM.STOK AS stok', 'JS.NAMA_JASA AS nama_jasa', 'JS.NAMA_PEMILIK AS nama_pemilik')
            ->where('KM.ID_JASA', '=',session('id'))
            ->get();
        $result = $this->getCostumes($data);
//        var_dump($result);
        return $result;
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
    // public function tampilKostum(){
    //     $data = array();
    //     $data['kostum'] = DB::table('kostum')->where('id_jasa', session('id'))->get();
    //     $data['gambar'] = DB::table('gambar')->where('id_kostum', $data['kostum']->id)->first();


    //     // $data = DB::table('KOSTUM AS K')
    //     //     ->join('JASA AS J', 'K.ID_JASA', '=', 'J.ID')
    //     //     ->join('GAMBAR AS G', function ($join) {
    //     //         $join->on('G.ID_KOSTUM', '=', 'K.ID'); })
    //     //     ->select('K.*', 'G.FILENAME')
    //     //     ->get();

    //     //     var_dump($data);
    //     return $data;
    // }
}
