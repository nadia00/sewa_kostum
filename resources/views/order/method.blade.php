@extends('layouts.master')

@section('content')
    <div id="content">
        <div class="container">

            <div class="row">
                {{--<div class="col-md-3">--}}
                    {{--<!-- *** MENUS AND FILTERS ***--}}
    {{--_________________________________________________________ -->--}}

                <div class="col-md-12">
                    <div class="row" id="productMain">
                        <div class="col-sm-8">
                            <div class="container-fluid" id="cart_content">

                                @if(sizeof($carts)<1)
                                    <div class='panel panel-danger text-center'>
                                        <div class='panel-heading'>No Cart Available</div>
                                    </div>
                                @else
                                    <table class="table table-striped cart-table">
                                        <tr>
                                            <th></th>
                                            <th class='text-center'>Name</th>
                                            <th class='text-center'>Price</th>
                                            <th class='text-center'>Quantity</th>
                                            <th class='text-center'>Total</th>
                                        </tr>

                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td>
                                                    <div class='row text-center'>
                                                        <img style='max-width: 100px' class="img-responsive img-thumbnail" src="{{url('/').Storage::disk('local')->url("app/".$cart->attributes->image) }}" alt='No Image'>
                                                    </div>
                                                </td>
                                                <td>

                                                    <div class='row text-center'>
                                                        {{ $cart->name }}
                                                    </div>
                                                </td>
                                                <td class='text-center'>Rp {{ number_format($cart->price) }}</td>
                                                <td class='text-center'> {{ $cart->quantity }}</td>
                                                <td class='text-center'>Rp {{ number_format($cart->price*$cart->quantity) }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 ">
                                        <h3 class="border-bottom">Subtotal:
                                            <span class="pull-right">Rp {{ Cart::getSubTotal() }}</span></h3>
                                    </div>
                                @endif
                            </div>





                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="container-fluid">
                                <div class="box text-center">
                                    <p><i class="fa fa-credit-card"></i> Alamat Pengiriman</p>
                                    <form action="{{route("user.order")}}" method="post" id="form_order">@csrf</form>
                                    @if(sizeof($address) > 0)
                                        <div class="form-group">
                                            <select class="form-control" form="form_order" name="addresses_id">
                                                @foreach($address as $val)
                                                    <option value="{{$val->id}}">{{$val->street}}, {{$val->district}} {{$val->country}} {{$val->zip_code}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class='panel panel-danger text-center'>
                                            <div class='panel-heading'>No Address</div>
                                        </div>
                                    @endif
                                    <button class="btn btn-primary" style="cursor: pointer" onclick="addAddress()">
                                        <i class="fa fa-plus"></i> Tambah Alamat
                                    </button>
                                    <script>
                                        function addAddress(){
                                            $("#add_address").modal('show');
                                        }
                                    </script>
                                </div>
                                <div class="box text-center row">
                                    <div class="col-lg-12">
                                        <div class="col-sm-12"><label class="form-group"><i class="fa fa-calendar"></i> Tanggal Sewa :</label></div>
                                        <div class="col-sm-12" style="padding-right: 0px;padding-left: 0px">
                                            <span><input type="date" form="form_order" class="form-control col-sm-2" id="first_date" name="first_date"></span>
                                        </div>
                                    </div>
                                    <button form="form_order" class="btn btn-primary" style="cursor: pointer; margin-top: 10px;">
                                        <i class="fa fa-plus"></i> Order
                                    </button>
                                    <script>
                                        function addAddress(){
                                            $("#add_address").modal('show');
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection