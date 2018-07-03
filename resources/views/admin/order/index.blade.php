@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Kostum</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Customer section</h3>
                    </div>

                    <hr>

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
                                <tr>
                                    <th>Order</th>
                                    <th>Pemesan</th>
                                    <th>Status</th>
                                </tr>
                                @foreach($orders as $val)
                                    <tr>
                                        <td>{{date('d M Y',strtotime($val->created_at))}}</td>
                                        <td>{{$val->user->first_name}}</td>
                                        <td>
                                            <form action="{{route("admin-shop.refresh-order")}}">
                                                <input type="hidden" name="order_id" value="{{$val->id}}">
                                                <select class="form-control" name="status">
                                                    <option value="{{0}}" @if(0==$val->status)selected @endif>Pesanan Baru</option>
                                                    <option value="{{1}}" @if(1==$val->status)selected @endif>Pesanan Di Terima</option>
                                                    <option value="{{2}}" @if(2==$val->status)selected @endif>Pengiriman</option>
                                                    <option value="{{3}}" @if(3==$val->status)selected @endif>Disewakan</option>
                                                    <option value="{{4}}" @if(4==$val->status)selected @endif>Telah Kembali</option>
                                                </select>
                                                <input class="form-control" type="submit" value="update">
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <table class="table">
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Size</th>
                                                    <th>Jumlah</th>
                                                    <th>Biaya</th>
                                                </tr>
                                                @foreach($val->orderProducts as $op)
                                                    <tr>
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