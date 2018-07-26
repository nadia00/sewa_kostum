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

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">New</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">On Process</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Return</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3">Done</a>
                        </li>
                    </ul>


                    <div class="tab-content">

                        <div id="home" class="container tab-pane active"><br>
                            @if(sizeof($new) != 0)
                                <div class="row">
                                    <table class="table table-bordered table-sm" style="width: 65%">
                                        @foreach( $new as $val)
                                            <tr>
                                                <td>
                                                    {{date('d M Y',strtotime($val->created_at))}}
                                                    <br>
                                                    {{$val->user->first_name}}

                                                    <form id="form-{{$val->id}}" action="{{route("admin-shop.refresh-order")}}">
                                                        <input type="hidden" name="order_id" value="{{$val->id}}">
                                                        <input type="hidden" name="status" value="{{1}}">
                                                        <button type="submit" class="btn btn-default" name="submit">Confirm</button>
                                                    </form>

                                                </td>
                                                <td colspan="3">
                                                    <table class="table table-bordered table-sm">
                                                        <tr>
                                                            <td style="width: 20%">Gambar</td>
                                                            <td>Nama kostum</td>
                                                            <td>Tgl Pakai</td>
                                                            <td>Ukuran</td>
                                                            <td>Kostum</td>
                                                            <td>Harga</td>
                                                        </tr>
                                                        @foreach($val->orderProducts as $op)
                                                            <tr>
                                                                <td><img style="height: 100px; margin: auto;" class="img img-responsive" src="{{url('/').Storage::disk('local')->url("app/".$op->product->product->image)}}" style="width: 20%"></td>
                                                                <td>{{$op->product->product->name}}</td>
                                                                <td>{{$val->first_date}}</td>
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
                                <div class="col-md-8" style="margin-top: 2%">
                                    <div class='panel panel-danger text-center'>
                                        <div class='panel-heading'>Tidak ada pesanan baru</div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div id="menu1" class="container tab-pane"><br>
                            @if(sizeof($process) != 0)
                                <div class="row">
                                    <table class="table table-bordered table-sm" style="width: 65%">
                                        @foreach( $process as $pro)
                                            <tr>
                                                <td>
                                                    {{date('d M Y',strtotime($pro->created_at))}}
                                                    <br>
                                                    {{$pro->user->first_name}}

                                                    <form id="form-{{$pro->id}}" action="{{route("admin-shop.refresh-order")}}">
                                                        <input type="hidden" name="order_id" value="{{$pro->id}}">
                                                        <select id="status" class="form-control" name="status">
                                                            <option value="{{2}}" @if(2==$pro->status)selected @endif>Pengiriman</option>
                                                            <option value="{{3}}" @if(3==$pro->status)selected @endif>Disewakan</option>
                                                            <option value="{{4}}" @if(4==$pro->status)selected @endif>Telah Kembali</option>
                                                        </select>
                                                        <input id="update-{{$pro->id}}" class="form-control" type="button" value="update">
                                                    </form>

                                                    <div class="modal fade" id="fine-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title" id="Login">Condition</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('admin-shop.insert-count')}}" method="post">
                                                                        @csrf
                                                                        <input type="hidden" form="form-{{$pro->id}}" name="order_id" value="{{$pro->id}}">
                                                                        @foreach($fine as $fines)
                                                                            <input type="hidden" form="form-{{$pro->id}}" name="fine_shop_id" value="{{$fines->id}}">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <input type="checkbox" form="form-{{$pro->id}}" name="type_id[]" value="{{$fines->fineType->id}}">
                                                                                    <label>{{$fines->fineType->name}}</label>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <?php
                                                                                    $datetime1 = new DateTime(date("Y-m-d",strtotime($pro->first_date))) ;
                                                                                    $datetime2 = new DateTime();
                                                                                    $interval = $datetime1->diff($datetime2);
                                                                                    if ($datetime1 > $datetime2)
                                                                                        $diff = 0;
                                                                                    else
                                                                                        $diff = $interval->d;
                                                                                    ?>

                                                                                    @if($fines->fineType->id == 1)
                                                                                        <input type="text" form="form-{{$pro->id}}" class="form-control" name="price-{{$fines->fineType->id}}" value="{{((int)$fines->price)*$diff}}" required autofocus>
                                                                                    @else
                                                                                        <input type="text" form="form-{{$pro->id}}" class="form-control" name="price-{{$fines->fineType->id}}" value="{{$fines->price}}" required autofocus>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <input type="number" value="1" form="form-{{$pro->id}}" class="form-control" name="sum_product-{{$fines->fineType->id}}" min="1" placeholder="Jumlah kostum {{$fines->fineType->name}}">
                                                                                </div>
                                                                            </div><br>
                                                                        @endforeach
                                                                        <br>
                                                                        <p class="text-center">
                                                                            <button form="form-{{$pro->id}}" type="submit" class="btn btn-primary"> Submit</button>
                                                                        </p>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        $("#update-{{$pro->id}}").click(function () {
                                                            val = $('#form-{{$pro->id}} #status').val();
                                                            if (val == 4){
                                                                $('#fine-modal').modal('show');
                                                            }else {
                                                                $("#form-{{$pro->id}}").submit();
                                                            }
                                                        });
                                                    </script>
                                                </td>
                                                <td colspan="3">
                                                    <table class="table table-bordered table-sm" style="width: 65%">
                                                        <tr>
                                                            <td style="width: 20%">Gambar</td>
                                                            <td>Nama kostum</td>
                                                            <td>Tgl Pakai</td>
                                                            <td>Ukuran</td>
                                                            <td>Kostum</td>
                                                            <td>Harga</td>
                                                        </tr>
                                                        @foreach($pro->orderProducts as $op)
                                                            <tr>
                                                                <td><img style="height: 100px; margin: auto;" class="img img-responsive" src="{{url('/').Storage::disk('local')->url("app/".$op->product->product->image)}}" style="width: 20%"></td>
                                                                <td>{{$op->product->product->name}}</td>
                                                                <td>{{$pro->first_date}}</td>
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
                                <div class="col-md-8" style="margin-top: 2%">
                                    <div class='panel panel-danger text-center'>
                                        <div class='panel-heading'>Tidak ada pesanan yang diproses</div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div id="menu2" class="container tab-pane"><br>
                            @if(sizeof($return) != 0)
                                <div class="row">
                                    <table class="table table-bordered table-sm" style="width: 65%">
                                    @foreach( $return as $return)
                                        <tr>
                                            <td>
                                                {{date('d M Y',strtotime($return->created_at))}}<br>
                                                {{$return->user->first_name}}<br><br>
                                                <?php
                                                    $denda = (int)$return->getFine($return->id);
                                                    $deposit = (int)$return->getDeposit($return->id);
                                                    $sisa = (int)($return->getDeposit($return->id) - $return->getFine($return->id));
                                                ?>
                                                Denda : {{$denda}}<br>
                                                Deposit : {{$deposit}}<br>
                                                Sisa : {{ $sisa }}
                                                @if($sisa > 0)
                                                    <form action="{{route('admin-shop.kembali')}}" method="post">@csrf
                                                        <input type="hidden" name="order_id" value="{{$return->id}}">
                                                        <input type="hidden" name="kembali" value="{{$sisa}}">
                                                        <button class="btn btn-default">Kembalikan</button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td colspan="3">
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td style="width: 20%">Gambar</td>
                                                        <td>Nama kostum</td>
                                                        <td>Tgl Pakai</td>
                                                        <td>Ukuran</td>
                                                        <td>Kostum</td>
                                                        <td>Harga</td>
                                                    </tr>
                                                    @foreach($return->orderProducts as $op)
                                                    <tr>
                                                        <td><img style="height: 100px; margin: auto;" class="img img-responsive" src="{{url('/').Storage::disk('local')->url("app/".$op->product->product->image)}}" style="width: 20%"></td>
                                                        <td>{{$op->product->product->name}}</td>
                                                        <td>{{$return->first_date}}</td>
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
                                <div class="col-md-8" style="margin-top: 2%">
                                    <div class='panel panel-danger text-center'>
                                        <div class='panel-heading'>Tidak ada pesanan yang sudah dikembalikan</div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div id="menu3" class="container tab-pane"><br>
                            @if(sizeof($done) != 0)
                                <div class="row">
                                    <table class="table table-bordered table-sm" style="width: 65%">
                                    @foreach( $done as $done)
                                        <tr>
                                            <td>
                                            {{date('d M Y',strtotime($done->created_at))}}
                                            <br>
                                            {{$done->user->first_name}}
                                            </td>
                                            <td colspan="3">
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <td style="width: 20%">Gambar</td>
                                                        <td>Nama kostum</td>
                                                        <td>Ukuran</td>
                                                        <td>Tgl Pakai</td>
                                                        <td>Kostum</td>
                                                        <td>Harga</td>
                                                    </tr>
                                                @foreach($done->orderProducts as $op)
                                                    <tr>
                                                        <td><img style="height: 100px; margin: auto;" class="img img-responsive" src="{{url('/').Storage::disk('local')->url("app/".$op->product->product->image)}}" style="width: 20%"></td>
                                                        <td>{{$op->product->product->name}}</td>
                                                        <td>{{$op->product->size->name}}</td>
                                                        <td>{{$done->first_date}}</td>
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
                                <div class="col-md-8" style="margin-top: 2%">
                                    <div class='panel panel-danger text-center'>
                                        <div class='panel-heading'>Tidak ada pesanan sukses</div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>

















                </div>
                <!-- /.products -->




            </div>
            <!-- /.col-md-9 -->

        </div>
    </div>

@endsection