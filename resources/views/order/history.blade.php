@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>History Order</li>
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
                                <a href="{{route('user.order-method')}}"><i class="fa fa-list"></i> Pesanan Saya</a>
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
                                            {{$val->shop->name}}

                                            {{--@if($val->status == 0)--}}
                                                {{--<form action="{{route("user.refresh-order")}}">--}}
                                                    {{--<input type="hidden" name="order_id" value="{{$val->id}}">--}}
                                                    {{--<button class="form-group btn btn-default" type="submit">Batalkan</button>--}}
                                                {{--</form>--}}
                                            {{--@else--}}
                                                {{--<button class="form-group btn btn-default" type="submit" disabled>Batalkan</button>--}}
                                            {{--@endif--}}
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