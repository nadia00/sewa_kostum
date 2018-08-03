@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Profil</li>
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
                            <li>
                                <a href="{{route('admin-shop.rekap')}}}}"><i class="fa fa-table"></i> Rekap Sewa</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.add-product')}}"><i class="fa fa-plus"></i> Tambah Kostum</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.product')}}"><i class="fa fa-list"></i> Daftar Kostum</a>
                            </li>
                            <li class="active">
                                <a href="{{route('admin-shop.profile')}}"><i class="fa fa-user"></i> Toko</a>
                            </li>
                        </ul>
                    </div>

                    <hr>

                    @role('user')
                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="customer-orders.html"><i class="fa fa-home"></i> Buka Toko</a>
                            </li>
                        </ul>
                    </div>
                    @endrole

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
                    <h1>My Shop</h1>
                    {{--<p class="lead">Change your personal details or your password here.</p>--}}

                    <h3>Personal detail <span><a href="{{ route('admin-shop.edit') }}"> <i class="fa fa-edit"></i></a></span> </h3>

                    <div class="row comment">
                        <div class="col-sm-3 col-md-2 text-center-xs">
                            <p>
                                <img src="{{url('/').Storage::disk('local')->url("app/".$data->image)}}" class="img-responsive img-thumbnail" alt="{{$data->name}}">
                            </p>
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <h5>{{ $data->name }}</h5>
                            <p class="posted"><i class="fa fa-quote-left"></i> {{ $data->description }} <i class="fa fa-quote-right"></i></p>
                            <p><i class="fa fa-phone"></i> {{ $data->phone }}</p>
                            <p><i class="fa fa-location-arrow"></i> {{$data->district}} , {{$data->city}} - {{$data->country}}</p>
                        </div>
                    </div>

                    <hr>
                    <h3>Fine and Deposit <span><a href="{{ route('admin-shop.cek') }}"> <i class="fa fa-edit"></i></a></span></h3>
                    <div class="row comment">
                        <div class="col-sm-3">
                            <p>Deposit</p>
                            <p>Overdue Fine</p>
                            <p>Broken Fine</p>
                            <p>Lost Fine</p>
                        </div>
                        <div class="col-sm-6">
                            @if(sizeof($data->deposit) != 0)
                                <p> : {{$data->deposit}}% Total harga sewa</p>
                            @else
                                <p> : Data belum dilengkapi</p>
                            @endif

                            @if(sizeof($fineshop) != 0)
                                @foreach($fineshop as $fineshop)
                                <p> : Rp {{$fineshop->price}}</p>
                                @endforeach
                            @else
                                <p> : Data belum dilengkapi</p>
                                <p> : Data belum dilengkapi</p>
                                <p> : Data belum dilengkapi</p>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <h3>My Activity</h3>
                    <div class="row comment">
                        <div class="col-sm-9 col-md-10">
                            <h5>{{$data->name}}</h5>
                            <p class="posted"><i class="fa fa-clock-o"></i> <b>Since</b> {{date('d M Y',strtotime($data->created_at))}}</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Total Products</p>
                            <p>Order Success</p>
                            <p>Order on Process</p>
                            <p>Order Failed</p>
                        </div>
                        <div class="col-sm-2">
                            <p> : {{$countproduct}}</p>
                            <p> : {{$countOrderC}}</p>
                            <p> : {{$countOrderP}}</p>
                            <p> : {{$countOrderR}}</p>
                        </div>
                    </div>

                    <!-- /.comment -->

                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

@endsection