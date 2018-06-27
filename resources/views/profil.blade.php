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
                        <h3 class="panel-title">User section</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="customer-orders.html"><i class="fa fa-list"></i> Pesanan Saya</a>
                            </li>
                            <li>
                                <a href="customer-wishlist.html"><i class="fa fa-heart"></i> Wishlist</a>
                            </li>
                            <li class="active">
                                <a href="{{url('/user')}}"><i class="fa fa-user"></i> Profil</a>
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
                    <h1>My account</h1>
                    <p class="lead">Change your personal details or your password here.</p>
                    <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                    <h3>Personal details</h3>
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="firstname">Nama Depan</label>
                                    <input type="text" class="form-control" id="firstname" value="{{$data->first_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Nama Belakang</label>
                                    <input type="text" class="form-control" id="lastname" value="{{$data->last_name}}">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Telephone</label>
                                    <input type="text" class="form-control" id="phone" value="{{$data->phone_number}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" value="{{$data->email}}">
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                            </div>
                        </div>
                    </form>

                    <h3>My Shop</h3>
                    <div class="row comment">
                        <div class="col-sm-3 col-md-2 text-center-xs">
                            <p>
                                <img src="{{url('/').Storage::disk('local')->url("app/".$data->shop->image)}}" class="img-responsive img-thumbnail" alt="{{$data->nama_toko}}">
                            </p>
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <h5>{{$data->shop->name}}</h5>
                            <p class="posted">{{$data->shop->description}}</p>
                            <p><i class="fa fa-location-arrow"></i> {{$data->shop->district}} , {{$data->shop->city}} - {{$data->shop->country}}</p>
                            <p><i class="fa fa-phone"></i> {{$data->shop->phone}}</p>
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