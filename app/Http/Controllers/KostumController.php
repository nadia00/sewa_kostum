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
    public function showKostumJasa(){
        $kostum = $this->tampilKostum();
        $gambar = $this->tampilGambar($kostum);
        
        return view('jasa.kostum')
        ->with('kostum', $kostum)
        ->with('gambar', $gambar);
    }
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
        

        return back()->with('success','Image Upload successful');
    }
    public function tampilKostum(){
        $kostum = DB::table('kostum')->where('id_jasa', session('id'))->get();
        return $kostum;
    }

    public function tampilGambar($kostum){
       $gambar = DB::table('gambar')->where('id_kostum', $kostum[0]->id)->get();
       return $gambar;
    }

}