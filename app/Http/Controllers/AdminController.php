<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Models\Kategori;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Role
    public function addRole(Request $request){
        Role::create($request->all());
        return redirect()->route('admin.role');
    }

    //Kategori
    public function showKategori(){
        $data = Kategori::all();
        return view('admin/kategori')->with('data', $data);
    }
    public function addKategori(Request $request){
        Kategori::create($request->all());
        return redirect()->route('admin.kategori');
    }
    public function updateKategori(Request $request){
        Kategori::where('id', '=', $request->id)->update([
            'nama'=>$request->nama,
            'deskripsi'=>$request->deskripsi,
        ]);
        return redirect()->route('admin.kategori');
    }
    public function deleteKategori(Request $request){
        Kategori::where('id', '=', $request->id)->delete();
    }

}
