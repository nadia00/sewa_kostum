@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Rekap Penyewaan</li>
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
                            <li>
                                <a href="{{route('admin-shop.order')}}"><i class="fa fa-th-list"></i> Penyewaan</a>
                            </li>
                            <li  class="active">
                                <a href="{{route('admin-shop.rekap')}}"><i class="fa fa-table"></i> Rekap Sewa</a>
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

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Riwayat Penyewaan
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div id="user" class="form-group col-lg-4 col-sm-4">
                                        <select id="month" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="{{date("m", strtotime('-1 month'))}}">1 Bulan</option>
                                            <option value="{{date("m",strtotime('-3 month'))}}">3 Bulan</option>
                                            <option value="{{date("m",strtotime('-6 month'))}}">6 Bulan</option>
                                        </select>
                                        {{--{{date("m")}}--}}
                                    </div>
                                </div>
                                @if(sizeof($orders) != 0)
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                        <tr>
                                            <td>Tanggal Sewa</td>
                                            <td>Penyewa</td>
                                            <td>Denda</td>
                                            <td>Detail</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $orders as $order)
                                            <tr>
                                                <td>
                                                    {{date('D,d M Y',strtotime($order->created_at))}}
                                                </td>
                                                <td>{{$order->user->first_name}}</td>
                                                <td  >@if(sizeof($order->fine) != 0 ){{$order->fine->total}}@else - @endif</td>
                                                <td>
                                                    @foreach($order->orderProducts as $op)
                                                        <div class="container-fluid row">
                                                            <div class="col-lg-3 col-md-4">
                                                                <div class="row center-block">
                                                                    <img style="max-width: 100px; max-height: 200px" class="img img-responsive" src="{{url('/').Storage::disk('local')->url("app/".$op->product->product->image)}}">
                                                                </div>
                                                                <div class="row text-center">
                                                                    {{$op->product->product->name}}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-4">
                                                                <div class="row">
                                                                    Peminjaman :<br>{{$order->first_date}}
                                                                </div>
                                                                <div class="row">
                                                                    Pengembalian :<br>{{$order->date_return}}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col-md-4">qty : {{$op->quantity}}</div>
                                                            <div class="col-lg-2 col-md-4 text-center">
                                                                @if($order->status == 0)
                                                                    <div class="label label-info">New</div>
                                                                @elseif($order->status == 1)
                                                                    <div class="label label-danger">Confirm</div>
                                                                @elseif($order->status == 2)
                                                                    <div class="label label-warning">Sending</div>
                                                                @elseif($order->status == 3)
                                                                    <div class="label label-success">Rented</div>
                                                                @elseif($order->status == 4)
                                                                    <div class="label label-primary">Return</div>
                                                                @elseif($order->status == 5)
                                                                    <div class="label label-default">Done</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p style="text-align: center">Tidak ada riwayat penyewaan.</p>
                                @endif
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            table = $("#table").DataTable({
                ordering:false,
            });
            $('#month').change( function() {
                table.draw();
            } );
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    let date = new Date(data[0]);
                    let month = parseInt( $("#month").val());
                    let dat = parseInt( date.getMonth() );
                    console.log("select : "+dat);
                    console.log("this : "+month);
                    return (isNaN(month)) ||
                        dat >= month;

                }
            );

        });
    </script>
@endsection