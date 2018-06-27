<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return $this->getMyProfile();;
    }

    public function address(Request $request){
        Address::create([
            'user_id'=> Auth::user()->id,
            'city'=> $request->city,
            'country'=>"Indonesia",
            'district'=>$request->district,
            'street'=>$request->street,
            'zip_code'=>$request->zip_code,
            'phone_number'=>$request->phone_number
        ]);
        return redirect()->back();
<<<<<<< HEAD
    }

=======
    }


    public function getMyProfile(){
        $user_id = Auth::user()->id;
        $data = DB::table('USERS as US')
            ->join('TOKO AS TK', 'TK.ID_USER', '=', 'US.ID')
            ->select('US.FULLNAME AS nama', 'US.EMAIL AS email', 'US.PHONE AS telp',
                'TK.NAMA AS nama_toko', 'TK.MOTTO AS motto_toko', 'TK.LOKASI AS lokasi_toko', 'TK.TELEPON AS telp_toko')
            ->where('ID_USER', '=', $user_id)
            -> first();
        return view('profil')->with('data', $data);
    }

    public function getOrder(){
        $data = DB::table('SEWA AS S')
            ->join('TOKO AS TK', 'S.ID_TOKO','=','TK.ID')
            ->join('DETAIL_SEWA AS DS', 'S.ID','=','DS.ID_SEWA')
            ->join('USERS AS U', 'S.ID_PENYEWA','=','U.ID')
            ->join('KOSTUM AS K', 'DS.ID_KOSTUM','=','K.ID' )
            ->select('S.ID AS id_sewa','TK.ID AS id_toko', 'U.ID AS id_penyewa', 'K.ID AS id_kostum',
                'U.FULLNAME AS nama_penyewa','DS.CREATED_AT AS tanggal_sewa','K.NAMA AS nama_kostum',
                'DS.JUMLAH_SEWA AS jumlah_sewa', 'DS.PEMAKAIAN AS tanggal_pakai')
            ->where('U.ID','=',User::all()->firstWhere('id','=',Auth::user()->id)->id)
            ->get();

        $dataterima = DB::table('SEWA AS S')
            ->join('TOKO AS TK', 'S.ID_TOKO','=','TK.ID')
            ->join('DETAIL_SEWA AS DS', 'S.ID','=','DS.ID_SEWA')
            ->join('USERS AS U', 'S.ID_PENYEWA','=','U.ID')
            ->join('KOSTUM AS K', 'DS.ID_KOSTUM','=','K.ID' )
            ->select('S.ID AS id_sewa','TK.ID AS id_toko', 'U.ID AS id_penyewa', 'K.ID AS id_kostum',
                'U.FULLNAME AS nama_penyewa','DS.CREATED_AT AS tanggal_sewa','K.NAMA AS nama_kostum',
                'DS.JUMLAH_SEWA AS jumlah_sewa', 'DS.PEMAKAIAN AS tanggal_pakai')
            ->where('TK.ID','=',User::all()->firstWhere('id','=',Auth::user()->id)->id)
            ->where('DS.STATUS', '=', '1')
            ->get();

        $datatolak = DB::table('SEWA AS S')
            ->join('TOKO AS TK', 'S.ID_TOKO','=','TK.ID')
            ->join('DETAIL_SEWA AS DS', 'S.ID','=','DS.ID_SEWA')
            ->join('USERS AS U', 'S.ID_PENYEWA','=','U.ID')
            ->join('KOSTUM AS K', 'DS.ID_KOSTUM','=','K.ID' )
            ->select('S.ID AS id_sewa','TK.ID AS id_toko', 'U.ID AS id_penyewa', 'K.ID AS id_kostum',
                'U.FULLNAME AS nama_penyewa','DS.CREATED_AT AS tanggal_sewa','K.NAMA AS nama_kostum',
                'DS.JUMLAH_SEWA AS jumlah_sewa', 'DS.PEMAKAIAN AS tanggal_pakai')
            ->where('TK.ID','=',User::all()->firstWhere('id','=',Auth::user()->id)->id)
            ->where('DS.STATUS', '=', '0')
            ->get();
        $display = view('pesanan');
        if (sizeof($data) != 0){
            $display->with('data',json_decode(json_encode($this->getGambar($data))));
        }
        if (sizeof($dataterima) != 0){
            $display->with('dataterima',json_decode(json_encode($this->getGambar($dataterima))));
        }
        if (sizeof($dataterima) != 0){
            $display->with('datatolak',json_decode(json_encode($this->getGambar($datatolak))));
        }
        return $display;

    }

    public function getGambar($data){
        $result = array();
        foreach ($data as $val) {
            $image = DB::table('KOSTUM_GAMBAR')->where('ID_KOSTUM', '=', "$val->id_kostum")->first();
            $final = [
                "id_sewa" => $val->id_sewa,
                "id_toko" => $val->id_toko,
                "id_penyewa" => $val->id_penyewa,
                "id_kostum" => $val->id_kostum,
                "nama_penyewa" => $val->nama_penyewa,
                "tanggal_sewa" => $val->tanggal_sewa,
                "jumlah_sewa" => $val->jumlah_sewa,
                "pemakaian" => $val->tanggal_pakai,
                "nama_kostum" => $val->nama_kostum,
                "gambar_kostum" => $image->filepath,
            ];
            array_push($result, $final);
        }
        return $result;
    }
>>>>>>> 48e35bfb1baf557eafa08c0e4523c3a5233cdaeb

    public function getMyProfile(){
        $data = User::with('shop')->where('id', '=', Auth::user()->id)->first();
        return view('profil')->with('data', $data);
    }

    
}
