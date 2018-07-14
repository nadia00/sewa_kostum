@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Penyewaan</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Shop section</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li  class="active">
                                <a href="{{route('admin-shop.order')}}}}"><i class="fa fa-th-list"></i> Penyewaan</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.add-product')}}"><i class="fa fa-plus"></i> Tambah Kostum</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.product')}}"><i class="fa fa-list"></i> Daftar Kostum</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.profile')}}"><i class="fa fa-user"></i> Toko</a>
                            </li>
                        </ul>
                    </div>

                    <hr>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>

                </div>
                <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <div class="col-md-9">

                <div class="box">
                    @if(!empty($orders))
                        <div class="row">
                            <table class="table">
                                {{--<tr>--}}
                                    {{--<th>Order</th>--}}
                                    {{--<th>Pemesan</th>--}}
                                    {{--<th>Status</th>--}}
                                {{--</tr>--}}
                                @foreach( $orders as $val)
                                    <tr>
                                        <td>
                                            {{date('d M Y',strtotime($val->created_at))}}
                                            <br>
                                            {{$val->user->first_name}}

                                            <form id="form-{{$val->id}}" action="{{route("admin-shop.refresh-order")}}">
                                                <input type="hidden" name="order_id" value="{{$val->id}}">
                                                <select id="status" class="form-control" name="status">
                                                    <option value="{{0}}" @if(0==$val->status)selected @endif>Pesanan Baru</option>
                                                    <option value="{{1}}" @if(1==$val->status)selected @endif>Batalkan</option>
                                                    <option value="{{2}}" @if(2==$val->status)selected @endif>Pesanan Di Terima</option>
                                                    <option value="{{3}}" @if(3==$val->status)selected @endif>Pengiriman</option>
                                                    <option value="{{4}}" @if(4==$val->status)selected @endif>Disewakan</option>
                                                    <option value="{{5}}" @if(5==$val->status)selected @endif>Telah Kembali</option>
                                                </select>
                                                <input id="update-{{$val->id}}" class="form-control" type="button" value="update">
                                            </form>

                                            <div class="modal fade" id="fine-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="Login">Condition</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{--<form action="{{route('admin-shop.insert-count')}}" method="post">--}}
                                                                {{--@csrf--}}
                                                                <input type="hidden" form="form-{{$val->id}}" name="order_id" value="{{$val->id}}">
                                                                @foreach($fine as $fines)
                                                                    <input type="hidden" form="form-{{$val->id}}" name="fine_shop_id" value="{{$fines->id}}">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <input type="checkbox" form="form-{{$val->id}}" name="type_id[]" value="{{$fines->fineType->id}}">
                                                                            <label>{{$fines->fineType->name}}</label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <?php
                                                                            $datetime1 = new DateTime(date("Y-m-d",strtotime($val->first_date))) ;
                                                                            $datetime2 = new DateTime();
                                                                            $interval = $datetime1->diff($datetime2);
                                                                            if ($datetime1 > $datetime2)
                                                                                $diff = 0;
                                                                            else
                                                                                $diff = $interval->d;
                                                                            ?>

                                                                        @if($fines->fineType->id == 1)
                                                                               <input type="text" form="form-{{$val->id}}" class="form-control" name="price-{{$fines->fineType->id}}" value="{{((int)$fines->price)*$diff}}" required autofocus>
                                                                            @else
                                                                                <input type="text" form="form-{{$val->id}}" class="form-control" name="price-{{$fines->fineType->id}}" value="{{$fines->price}}" required autofocus>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <input type="number" value="1" form="form-{{$val->id}}" class="form-control" name="sum_product-{{$fines->fineType->id}}" min="1" placeholder="Jumlah kostum {{$fines->fineType->name}}">
                                                                        </div>
                                                                    </div><br>
                                                                @endforeach
                                                                <br>
                                                                <p class="text-center">
                                                                    <button form="form-{{$val->id}}" type="submit" class="btn btn-primary"> Submit</button>
                                                                </p>
                                                            {{--</form>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                $("#update-{{$val->id}}").click(function () {
                                                    val = $('#form-{{$val->id}} #status').val();
                                                    if (val == 5){
                                                        $('#fine-modal').modal('show');
                                                    }else {
                                                        $("#form-{{$val->id}}").submit();
                                                    }
                                                });
                                            </script>
                                        </td>
                                        <td colspan="3">
                                            <table class="table">
                                                @foreach($val->orderProducts as $op)
                                                    <tr>
                                                        <td><img src="{{url('/').Storage::disk('local')->url("app/".$op->product->product->image)}}" style="width: 20%"></td>
                                                        <td>{{$op->product->product->name}}</td>
                                                        <td>{{$op->product->size->name}}</td>
                                                        <td>{{$op->quantity}}</td>
                                                        <td class="text-left">Rp. {{number_format($op->quantity*$op->price)}}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @else
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <p>Belum Ada Pesenanan.</p>
                            </div>
                        </div>
                    @endif

                </div>
                <!-- /.products -->

                <div class="pages">
                    <ul class="pagination">
                        <li><a href="#">&laquo;</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>


            </div>
            <!-- /.col-md-9 -->

        </div>
    </div>

@endsection