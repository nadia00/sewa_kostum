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
                        <h3 class="panel-title">User section</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="{{route('user.order-method')}}"><i class="fa fa-shopping-cart"></i> Pesanan Saya</a>
                            </li>
                            <li class="active">
                                <a href="{{route('user.order-list')}}"><i class="fa fa-list"></i> Daftar Pesanan</a>
                            </li>
                            <li>
                                <a href="{{url('/user')}}"><i class="fa fa-user"></i> Profil</a>
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
                                        @foreach( $new as $new)
                                            <tr>
                                                <td>
                                                    {{date('d M Y',strtotime($new->created_at))}}
                                                    <br>
                                                    {{$new->shop->name}}
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
                                                        @foreach($new->orderProducts as $op)
                                                            <tr>
                                                                <td><img style="height: 100px; margin: auto;" class="img img-responsive" src="{{url('/').Storage::disk('local')->url("app/".$op->product->product->image)}}" style="width: 20%"></td>
                                                                <td>{{$op->product->product->name}}</td>
                                                                <td>{{$new->first_date}}</td>
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
                                        @foreach( $process as $process)
                                            <tr>
                                                <td>
                                                    {{date('d M Y',strtotime($process->created_at))}}
                                                    <br>
                                                    {{$process->shop->name}}
                                                    <br>
                                                    <?php
                                                    if($process->status == 1)
                                                        $name = "confirm";
                                                    elseif ($process->status == 2)
                                                        $name = "sending";
                                                    elseif ($process->status == 3)
                                                        $name = "rented";
                                                    ?>
                                                    {{$name}}
                                                </td>
                                                <td colspan="3">
                                                    <table class="table" style="width: 65%">
                                                        @foreach($process->orderProducts as $op)
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
                                                    {{$return->shop->name}}<br><br>
                                                    <?php
                                                        $denda = (int)$return->getFine($return->id);
                                                        $deposit = (int)$return->getDeposit($return->id);
                                                        $sisa = (int)($return->getDeposit($return->id) - $return->getFine($return->id));
                                                    ?>
                                                    Denda : {{$denda}}<br>
                                                    Deposit : {{$deposit}}<br>
                                                    Sisa : {{ $sisa }}
                                                    <?php $fine = (int)($sisa - 2 * $sisa); ?>
                                                    {{--{{dd($sisa)}}--}}
                                                    @if($sisa <= 0)
                                                        <form action="{{route('user.pay-fine')}}" method="post" enctype="multipart/form-data">@csrf
                                                            <input type="hidden" name="order_id" value="{{$return->id}}">
                                                            <input type="hidden" name="fine" value="{{$fine}}">
                                                            <button class="btn btn-default">Bayar</button>
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
                                                    {{$done->shop->name}}
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
                                                        @foreach($done->orderProducts as $op)
                                                            <tr>
                                                                <td><img style="height: 100px; margin: auto;" class="img img-responsive" src="{{url('/').Storage::disk('local')->url("app/".$op->product->product->image)}}" style="width: 20%"></td>
                                                                <td>{{$op->product->product->name}}</td>
                                                                <td>{{$done->first_date}}</td>
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