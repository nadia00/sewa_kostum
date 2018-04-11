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
        return view('jasa.kostum');
    }
    
    public function showTambahKostum(){
        return view('jasa.kostum-tambah');
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

    public function showEditKostum(){
        return view('jasa.kostum-edit');
    }
    public function editKostum(Request $request){
        
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath, $input['imagename']);
        $this->postImage->add($input);
        

        $data = DB::table('gambar')->insert([
            ''
        ]);

        return back()->with('success','Image Upload successful');
    }
}
