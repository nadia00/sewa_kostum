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
                                <a href="{{route('admin-shop.order')}}}}"><i class="fa fa-th-list"></i> Penyewaan</a>
                            </li>
                            <li  class="active">
                                <a href="{{route('admin-shop.rekap')}}}}"><i class="fa fa-table"></i> Rekap Sewa</a>
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
                                @if(sizeof($orders) != 0)
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Penyewa</th>
                                        <th>Kostum</th>
                                        <th>Ukuran</th>
                                        <th>Jumlah</th>
                                        <th>Tgl Sewa</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <?php
                                                if($order->status == 0)
                                                    $name = "New";
                                                elseif ($order->status == 1)
                                                    $name = "Confirm";
                                                elseif ($order->status == 2)
                                                    $name = "Sending";
                                                elseif ($order->status == 3)
                                                    $name = "Rented";
                                                elseif ($order->status == 4)
                                                    $name = "Return";
                                                elseif ($order->status == 5)
                                                    $name = "Done";
                                            ?>
                                            <tr class="odd gradeX">
                                                <td>{{$order->user->first_name}} {{$order->user->last_name}}</td>
                                                <td colspan="6">
                                                    <table>
                                                        <tbody>
                                                            @foreach($order->orderProducts as $order_detail)
                                                                <tr>
                                                                    <td>{{$order_detail->product->product->name}}</td>
                                                                    <td>{{$order_detail->product->size->name}}</td>
                                                                    <td class="center">{{$order_detail->quantity}}</td>
                                                                    <td>{{$order->first_date}}</td>
                                                                    <td class="center">{{$name}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
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

@endsection