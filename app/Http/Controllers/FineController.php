<?php

namespace App\Http\Controllers;

use App\Order;
use App\FineShop;
use Illuminate\Http\Request;
use DateTime;

class FineController extends Controller
{
    public function overdue($order_id){
        $orders = Order::where("id",'=',$order_id)->first();

        $dateTime = new DateTime(date("Y-m-d",strtotime($orders->first_date)));
        $due_date = $dateTime->modify('+1 day');
        $date_now = new DateTime();

        $interval = $due_date->diff($date_now);
        dd($interval);

    }

}
