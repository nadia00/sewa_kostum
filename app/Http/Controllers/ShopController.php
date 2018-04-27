<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadKostum;
use App\Models\Kostum;
use App\Models\KostumGambar;
use App\Models\Role;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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

    public function index(){
        $user = Auth::user()->hasRole('user-seller');
        if (!$user){
            return view('shop/create');
        }else{
            return $this->getMyCostumes();
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_toko' => 'required|string|max:255',
            'motto' => 'required|string|email|max:255',
            'telepon' => 'required|number|max:15|',
            'lokasi' => 'required|string|min:200',
        ]);
    }

    /**
     * Create a shop user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Toko
     */

    protected function createShop(Request $request){
        $user_id = Auth::user()->id;
        Toko::create([
            'id_penjual'=>$user_id,
            'nama'=>$request->post('nama_toko'),
            'motto'=>$request->post('motto'),
            'telepon'=>$request->post('telepon'),
            'lokasi'=>$request->post('lokasi'),
            ]);
        $role = Role::find(3)->id;
        DB::table('role_user')->where('user_id','=',$user_id)->delete();
        DB::table('role_user')->insert(['user_id'=>$user_id, 'role_id'=>$role]);
        return redirect()->route('user.shop');
    }

    public function getMyCostumes(){
        $result = array();
        $data = DB::table('KOSTUM AS KM')
            ->join('TOKO AS TK', 'KM.ID_TOKO','=','TK.ID')
            ->join('KATEGORI AS KI', 'KM.ID_KATEGORI','=','KI.ID')
            ->select('KM.ID AS id_kostum','TK.ID AS id_toko', 'KM.NAMA AS nama_kostum',
                'KI.NAMA AS kategori','KM.HARGA AS harga', 'KM.JUMLAH_STOK AS stok','KM.JUMLAH_KESELURUHAN AS total')
            ->where('TK.ID','=',Toko::all()->firstWhere('id_penjual','=',Auth::user()->id)->id)
            ->get();
        if (sizeof($data) != 0){
            foreach ($data as $val){
                $image = DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM','=',"$val->id_kostum")->first();
                $final = [
                    "id_kostum" => $val->id_kostum,
                    "id_toko" => $val->id_toko,
                    "nama_kostum" => $val->nama_kostum,
                    "gambar_kostum" => $image->filepath,
                    "kategori" => $val->kategori,
                    "harga" => $val->harga,
                    "stok" => $val->stok,
                    "total" => $val->total,
                ];
                array_push($result, $final);
            }
            return view('shop/edit')->with('data',json_decode(json_encode($result)));
        }else{
            return view('shop/edit');
        }
    }
    public function getDetailCostume($id_kostum){
        $data = DB::table('KOSTUM AS KM')
            ->join('TOKO AS TK', 'KM.ID_TOKO','=','TK.ID')
            ->join('KATEGORI AS KI', 'KM.ID_KATEGORI','=','KI.ID')
            ->select('KM.ID AS id_kostum','TK.ID AS id_toko', 'KM.NAMA AS nama_kostum',
                'KI.NAMA AS kategori','KM.HARGA AS harga', 'KM.JUMLAH_STOK AS stok','KM.JUMLAH_KESELURUHAN AS total',
                'TK.NAMA AS nama_toko','TK.MOTTO AS motto_toko','TK.TELEPON AS telepon_toko','TK.LOKASI AS lokasi_toko',
                'KM.DESKRIPSI AS deskripsi_kostum'
            )
            ->where('KM.ID','=',$id_kostum)
            ->get();
        $final = [
            "id_kostum" => $data[0]->id_kostum,
            "id_toko" => $data[0]->id_toko,
            "nama_kostum" => $data[0]->nama_kostum,
            "deskripsi_kostum" => $data[0]->deskripsi_kostum,
            "kategori" => $data[0]->kategori,
            "harga" => $data[0]->harga,
            "stok" => $data[0]->stok,
            "nama_toko" => $data[0]->nama_toko,
            "gambar" => array()
        ];
        $image =  DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM','=',$data[0]->id_kostum)->get();
        foreach ($image as $val){
            array_push($final['gambar'], array('filepath' => $val->filepath));
        }
//        var_dump($final);
        return view('shop/detail')->with('data',json_decode(json_encode($final)));
    }

    

    public function detailKostumJasa($data){
    }

    public function deleteCostume($id){
        Kostum::all()->where('id','=',$id)->delete();
        return redirect()->route('user.shop');
    }

    public function addCostume(UploadKostum $request){
        $kostum = Kostum::create([
            'id_kategori'=>$request->post('id_kategori'),
            'id_toko'=>$request->post('id_toko'),
            'nama'=>$request->post('nama'),
            'deskripsi'=>$request->post('keterangan'),
            'harga'=>$request->post('harga'),
            'jumlah_keseluruhan'=>$request->post('jumlah'),
            'jumlah_stok'=>$request->post('stok'),
        ]);
        // Making counting of uploaded images
        $file_count = count($request->gambar);
        // var_dump($file_count);

        foreach($request->gambar as $gambar) {
            $filepath = $gambar->store('image');
            KostumGambar::create([
                'id_kostum' => $kostum->id,
                'filepath' => $filepath,
            ]);
        }
    }



}
