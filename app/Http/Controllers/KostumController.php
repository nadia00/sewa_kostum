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


    public function showTambahJasa(){
        return view('jasa.kostum-tambah');
    }
    public function tambahJasa(UploadKostum $request){
        $kostum = Kostum::create($request->all());
        // Making counting of uploaded images
        $file_count = count($request->gambar);
        // var_dump($file_count);
        
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
        return redirect('jasa/kostum');
    }

    public function showEditJasa(){
        return view('jasa.kostum-edit');
    }
    public function editJasa(Request $request){
        

    }

    public function showJasa(){
        $kostum = $this->getKostumJasa();
        return view('jasa.kostum')
        ->with('kostum', $kostum);
    }
    public function getKostumJasa(){
        $data = DB::table('KOSTUM AS KM')
            ->join('JASA AS JS', 'KM.ID_JASA','=','JS.ID')
            ->join('KATEGORI AS KI', 'KM.ID_KATEGORI','=','KI.ID')
            ->select('KM.ID AS id_kostum', 'JS.ID AS id_jasa', 'KM.NAMA AS nama_kostum',
                'KI.NAMA AS kategori','KM.HARGA AS harga', 'KM.STOK AS stok', 'JS.NAMA_JASA AS nama_jasa', 'JS.NAMA_PEMILIK AS nama_pemilik')
            ->where('KM.ID_JASA', '=',session('id'))
            ->get();

        $result = $this->detailKostumJasa($data);
        return $result;
    }
    public function detailKostumJasa($data){
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

    public function delKostum($id){
        DB::delete('delete from gambar where id = ?',[$id]);
    }


    public function tampilAll(){
        $data = DB::table('KOSTUM AS KM')
            ->join('JASA AS JS', 'KM.ID_JASA','=','JS.ID')
            ->join('KATEGORI AS KI', 'KM.ID_KATEGORI','=','KI.ID')
            ->select('KM.ID AS id_kostum', 'JS.ID AS id_jasa', 'KM.NAMA AS nama_kostum',
                'KI.NAMA AS kategori','KM.HARGA AS harga', 'KM.STOK AS stok', 'JS.NAMA_JASA AS nama_jasa', 'JS.NAMA_PEMILIK AS nama_pemilik')
            ->get();
        $result = $this->getAllDetail($data);
        return view('home')
            ->with('result', $result);
    }

    public function getAllDetail($data){
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

    public function showDetail(Request $request){
        $id_kostum = $request->id;
        $data = $this->getDetail($id_kostum);
        
        return view('detail')
        ->with('kostum', json_decode(json_encode($data['kostum']))) 
        ->with('gambar', json_decode(json_encode($data['gambar'])));
    }
    public function getDetail($id_kostum){
        $result=array();
        $result['kostum'] = DB::table('KOSTUM AS KM')
            ->join('JASA AS JS', 'KM.ID_JASA','=','JS.ID')
            ->join('KATEGORI AS KI', 'KM.ID_KATEGORI','=','KI.ID')
            ->select('KM.ID AS id_kostum', 'JS.ID AS id_jasa', 'KM.NAMA AS nama_kostum',
                'KI.NAMA AS kategori','KM.HARGA AS harga', 'KM.STOK AS stok', 'JS.NAMA_JASA AS nama_jasa', 'JS.NAMA_PEMILIK AS nama_pemilik')
            ->where('KM.ID', '=', $id_kostum)->get();
        $result['gambar'] = DB::table('GAMBAR')->where('ID_KOSTUM','=',$id_kostum)->get();
        return $result;
    }



}
