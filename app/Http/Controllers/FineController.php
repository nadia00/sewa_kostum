<?php

namespace App\Http\Controllers;

use App\FineShop;
use Illuminate\Http\Request;


//overdue = 0
//broken = 1
//lost = 2

class FineController extends Controller
{
    public function overdue(){

    }

    public function broken(){
        $fine = FineShop::where([
            ['shop_id', '=', ''],
            ['type_id','=','1']
        ]);

    }

    public function lost(){

    }
}
