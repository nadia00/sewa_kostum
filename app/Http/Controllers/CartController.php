<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            "id"=>$request->id.$request->size_id,
            "name"=>$request->name,
            "qty"=>$request->qty,
            "price"=>$request->price,
            "options"=>[
                "id"=>$request->id,
                "id_shop"=>$request->id_shop,
                "duration_in_days"=>$request->duration_in_days,
                "size"=>$request->size_id,
                "image"=>$request->image,
            ]
        ];
        Cart::add($data);
        return "OK";
    }

    public function showOrder()
    {
        $carts = Cart::content();
        if($this->size()<1){
            return "
                <div class='panel panel-danger text-center'>
                    <div class='panel-heading'>No Cart Available</div>
                </div>
            ";
        }else{
            $data = "<table class=\"table table-striped cart-table\">
                    <tr>
                        <th class='text-center'>Name</th>
                        <th class='text-center'>Price</th>
                        <th class='text-center'>Quantity</th>
                        <th class='text-center'>Total</th>
                    </tr>";

            foreach ($carts as $cart){
                $data.= "                                
                    <tr>
                        <td>
                            <div class='row text-center'>
                            <img style='max-width: 100px' class=\"img-responsive img-thumbnail\" src='".url('/').Storage::disk('local')->url("app/".$cart->options->image)."' alt='No Image'>
                            </div>
                            <div class='row text-center'>
                                $cart->name
                            </div>
                        </td> 
                        <td class='text-center'>Rp. ".number_format($cart->price)."</td>
                        <td class='text-center'>".$cart->qty."</td>
                        <td class='text-center'>Rp. ".number_format($cart->price*$cart->qty)."</td>
                    </tr>";
            }
            $data.= "</table>
                    <div class=\"row\">
                        <div class=\"col-md-6\"></div>
                        <div class=\"col-md-6 \">
                            <h3 class=\"border-bottom\">Subtotal:
                            <span class=\"pull-right\">Rp. ".Cart::subtotal()."</span></h3>";
            $data.="        
                        </div>
                    </div>";
            return $data;

        }
    }

    public function show()
    {
        $carts = Cart::content();
        if($this->size()<1){
            return "
                <div class='panel panel-danger text-center'>
                    <div class='panel-heading'>No Cart Available</div>
                </div>
            ";
        }else{
            $data = "<table class=\"table table-striped cart-table\">
                    <tr>
                        <th class='text-center'>Name</th>
                        <th class='text-center'>Price</th>
                        <th class='text-center'>Quantity</th>
                        <th class='text-center'>Total</th>
                        <th class=\"text-right\"></th>
                    </tr>";

            foreach ($carts as $cart){
                $data.= "                                
                    <tr>
                        <td>
                            <div class='row text-center'>
                            <img style='max-width: 100px' class=\"img-responsive img-thumbnail\" src='".url('/').Storage::disk('local')->url("app/".$cart->options->image)."' alt='No Image'>
                            </div>
                            <div class='row text-center'>
                                $cart->name
                            </div>
                        </td> 
                        <td class='text-center'>Rp. ".number_format($cart->price)."</td>
                        <td class='text-center'>".$cart->qty."</td>
                        <td class='text-center'>Rp. ".number_format($cart->price*$cart->qty)."</td>
                        <td class='set-width-5 text-center'>
                            <a href='#' class='btn btn-danger' onclick='deleteCart(\"$cart->rowId\")'><i class='fa fa-trash-o'></i></a>
                        </td>
                    </tr>";
            }
            $data.= "</table>
                    <div class=\"row\">
                        <div class=\"col-md-6\"></div>
                        <div class=\"col-md-6 \">
                            <h3 class=\"border-bottom\">Subtotal:
                            <span class=\"pull-right\">Rp. ".Cart::subtotal()."</span></h3>
                            <div class=\"padding-top pull-right\">";
            if (Cart::count() > 0){
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

    public function delete($rowId)
    {
        Cart::remove("$rowId");
        return "OK";
    }

    public function destroy(){
        Cart::destroy();
        return "OK";
    }

    public function update(Request $request, $rowId)
    {
        $this->validate($request, [
            'qty' => 'required|numeric'
        ]);
        $qty = $request['qty'];
        Cart::update($rowId, $qty);
        return "OK";
    }

    function size(){
        return (int)Cart::count();
    }

    public function error($error)
    {
        $carts = Cart::content();
        return view('carts.cart')
            ->with('error', $error)
            ->with('carts', $carts);
    }
}
