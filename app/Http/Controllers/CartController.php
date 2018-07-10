<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller{

    function dateRange( $first, $last, $step = '+1 day', $format = 'Y/m/d' ) {
        $dates = array();
        $current = strtotime( $first );
        $last = strtotime( $last );

        while( $current <= $last ) {

            $dates[] = date( $format, $current );
            $current = strtotime( $step, $current );
        }
        return $dates;
    }


    public function store(Request $request){

        $data = array(
            "id"=>$request->id.$request->size_id,
            "name"=>$request->name,
            "quantity"=>$request->qty,
            "price"=>$request->price,
            "attributes"=>array(
                "id"=>$request->id,
                "id_shop"=>$request->id_shop,
                "id_product"=>$request->size_id,
                "size"=>$request->size_id,
                "image"=>$request->image,
            )
        );
        Cart::add($data);
    }



    public function delete($itemId){
        Cart::remove($itemId);
        return "OK";
    }

    public function destroy(){
        Cart::clear();
        return "OK";
    }

    function size(){
        $cartCollection = Cart::getTotalQuantity();
        return (int)$cartCollection;
    }

    public function show()
    {
        $carts = Cart::getContent();
        if($this->size()<1){
            return "
                <div class='panel panel-danger text-center'>
                    <div class='panel-heading'>No Cart Available</div>
                </div>
            ";
        }else{
            $data = "<table class=\"table table-striped cart-table\">
                    <tr>
                        <th class='text-center'>Product</th>
                        <th class='text-center'>Price</th>
                        <th class='text-center'>Quantity</th>
                        <th class='text-center'>Total</th>
                        <th class=\"text-right\"></th>
                    </tr>";
//            dd($carts);
            foreach ($carts as $cart){
                $data.= "
                    <tr>
                        <td>
                            <div class='row text-center'>
                            <img style='max-width: 100px' class=\"img-responsive img-thumbnail\" src='".url('/').Storage::disk('local')->url("app/".$cart->attributes->image)."' alt='No Image'>
                            </div>
                            <div class='row text-center'>
                                $cart->name
                            </div>
                        </td>
                        <td class='text-center'>Rp. ".number_format($cart->price)."</td>
                        <td class='text-center'>".$cart->quantity."</td>
                        <td class='text-center'>Rp. ".number_format($cart->price*$cart->quantity)."</td>
                        <td class='set-width-5 text-center'>
                            <a href='#' class='btn btn-danger' onclick='deleteCart(\"$cart->id\")'><i class='fa fa-trash-o'></i></a>
                        </td>
                    </tr>";
            }
            $data.= "</table>
                    <div class=\"row\">
                        <div class=\"col-md-6\"><p>*Harga belum termasuk ongkos kirim</p></div>
                        <div class=\"col-md-6 \">
                            <h3 class=\"border-bottom\">Subtotal:
                            <span class=\"pull-right\">Rp. ".Cart::getSubTotal()."</span></h3>
                            <div class=\"padding-top pull-right\">";
            if (Cart::getTotalQuantity() > 0){
                $data.="<a href=".route('user.order-method')."><button class=\"btn btn-success\">Order <span class=\"fa fa-shopping-cart\"></span></button></a>
                                                or";
            }
            $data.="<a href=\"".url('/') ."\"><button class=\"btn btn-default\">Continue shopping</button></a>
                            </div>
                        </div>
                    </div>";
            return $data;

        }
    }

}

