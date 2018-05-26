<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadKostum;
use App\Models\Kategori;
use App\Models\Kostum;
use App\Models\KostumDetail;
use App\Models\KostumGambar;
use App\Models\KostumKategori;
use App\Models\Role;
use App\Models\Toko;
use App\Models\Ukuran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Zizaco\Entrust\Traits\EntrustRoleTrait;

class ShopController extends Controller
{
    use EntrustRoleTrait;
    var $view;

    public function __construct()
    {
        $this->middleware('auth');
        $this->view = new HomeController();
    }

    public function index()
    {
        $user = Auth::user()->hasRole('user-seller');
        if (!$user) {
            return view('shop/create');
        } else {
            return $this->getMyProfile();
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_toko' => 'required|string|max:255',
            'motto' => 'required|string|email|max:255',
            'telepon' => 'required|number|max:15|',
            'lokasi' => 'required|string|min:200',
        ]);
    }

    protected function createShop(Request $request){
        $user_id = Auth::user()->id;
        $filepath = $request->gambar->store('image');
        Toko::create([
            'id_user'=>$user_id,
            'nama'=>$request->post('nama_toko'),
            'motto'=>$request->post('motto'),
            'telepon'=>$request->post('telepon'),
            'lokasi'=>$request->post('lokasi'),
            'filepath_gambar'=>$filepath,
        ]);
        $role = Role::find(3)->id;
        DB::table('role_user')->where('user_id','=',$user_id)->delete();
        DB::table('role_user')->insert(['user_id'=>$user_id, 'role_id'=>$role]);
        return $this->getMyProfile();
    }

    public function getMyProfile(){
        $user_id = Auth::user()->id;
        $data = DB::table('TOKO as TK')
            ->select('TK.NAMA AS nama_toko', 'TK.MOTTO AS motto_toko', 'TK.LOKASI AS lokasi_toko', 'TK.TELEPON AS telp_toko',
                'TK.CREATED_AT AS join', 'TK.FILEPATH_GAMBAR AS gambar')
            ->where('TK.ID_USER', '=', $user_id)
            -> first();
        return view('shop/profil')->with('data', $data);
    }

    public function addCostumeShow(){
        $kategori = DB::table('kategori')->get();
        return view('shop/kostum-add')
            ->with('kategori', $kategori);
    }

    public function addCostume(UploadKostum $request){
        $kostum = Kostum::create([
            'id_toko'=>$request->post('id_toko'),
            'nama'=>$request->post('nama'),
            'keterangan'=>$request->post('keterangan'),
        ]);
        foreach($request->gambar as $gambar) {
            $filepath = $gambar->store('image');
            KostumGambar::create([
                'id_kostum' => $kostum->id,
                'filepath' => $filepath,
            ]);
        }
        foreach($request->kategori as $kategori) {
            KostumKategori::create([
                'id_kostum' => $kostum->id,
                'id_kategori' => $kategori,
            ]);
        }
        return redirect()->route('kostum.size', $kostum->id);
    }

    public function costumeDetail($id){
        $ukuran = Ukuran::all();
        $kostum = Kostum::find($id)->first();
        $gambar = KostumGambar::find($id)->first();
        return view('shop/kostum-add-detail')
            ->with('ukuran',$ukuran)
            ->with('kostum',$kostum)
            ->with('gambar',$gambar)
            ->with('id_kostum',$id);
    }

    public function addDetailCostume(Request $request){
        KostumDetail::create($request->all());
        return redirect()->route('kostum.size', $request->id_kostum);
    }

    public function deleteCostume($id){
        KostumGambar::all()->where('id_kostum', '=', $id)->delete();
        KostumKategori::all()->where('id_kostum', '=', $id)->delete();
        KostumDetail::all()->where('id_kostum', '=', $id)->delete();
        Kostum::all()->where('id','=',$id)->delete();
        return redirect()->back();
    }

    public function getMyCostumes(){
        $result = array();
        $data = DB::table('KOSTUM AS KM')
            ->leftJoin('DETAIL_KOSTUM AS DK', 'DK.ID_KOSTUM', '=', 'KM.ID')
            ->join('TOKO AS TK', 'KM.ID_TOKO','=','TK.ID')
            ->join('KOSTUM_KATEGORI AS KK', 'KK.ID_KOSTUM','=','KM.ID')
            ->select(DB::raw('DISTINCT KM.id'), 'KM.ID AS id_kostum','TK.ID AS id_toko','TK.NAMA AS nama_toko','KM.NAMA AS nama_kostum')
            ->where('TK.ID_USER','=', Auth::user()->id )
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
            return view('shop.kostum')->with('data',json_decode(json_encode($result)));
        }else{
            return view('shop.kostum');
        }
    }

    public function getDetailCostume($id_kostum){
        $data = DB::table('KOSTUM AS KM')
            ->join('TOKO AS TK', 'KM.ID_TOKO','=','TK.ID')
            ->join('KOSTUM_KATEGORI AS KK', 'KK.ID_KOSTUM', '=', 'KM.ID')
            ->select('KM.ID AS id_kostum', 'TK.ID AS id_toko', 'TK.NAMA AS nama_toko', 'KM.KETERANGAN AS keterangan_kostum')
            ->where('KM.ID','=',$id_kostum)
            ->first();
        $final = [
            "id_kostum" => $data[0]->id_kostum,
            "id_toko" => $data[0]->id_toko,
            "nama_toko" => $data[0]->nama_toko,
            "nama_kostum" => $data[0]->nama_kostum,
            "keterangan_kostum" => $data[0]->keterangan_kostum,
            "gambar" => array(),
            "kategori" => array()
        ];
        $image =  DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM','=',$data[0]->id_kostum)->get();
        foreach ($image as $val){
            array_push($final['gambar'], array('filepath' => $val->filepath));
        }
        $categories =  DB::table('KOSTUM_KATEGORI')->where('ID_KOSTUM','=',$data[0]->id_kostum)->get();
        foreach ($categories as $val){
            array_push($final['kategori'], array('id_kategori' => $val->id_kategori));
        }

//        return view('shop/kostum-detail')->with('data',json_decode(json_encode($final)));
    }

}