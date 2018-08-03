<?php

namespace App\Http\Controllers\AdminShop;

use App\Http\Controllers\Controller;
use App\ShopLocation;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function setMaps(Request $request, $address = null, $lat = null, $lng = null, $url = null)
    {

        if($request->method() == "GET"){
            if($url == null){
                $url = url()->previous();
                $explode =  explode("/", $url);
                if (@$explode[5] == "edit") {
                    $route = $explode[5].'-'.$explode[4];
                }else{
                    $route = $explode[4];
                }
            }

            if($address == null || $lat == null || $lng == null){
                return view('admin.shop.maps', ['url' => $route]);
            }
        }
    }

    public function setActionMaps(Request $request)
    {
        return response()->json([
            "url" => route('user.create-shop', [
                'address' => $request->address,
                'lat' => $request->lat,
                'lng' => $request->lng,
            ])
        ]);
    }

}
