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
                                <a href="{{route('user.order-method')}}"><i class="fa fa-shopping-cart"></i> Pesanan Saya</a>
                            </li>
                            <li>
                                <a href="{{route('user.order-list')}}"><i class="fa fa-list"></i> Daftar Pesanan</a>
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

                    <h3>Personal details</h3>
                    <form action="{{route('user.edit-profile')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="firstname">Nama Depan</label>
                                    <input type="text" class="form-control" id="firstname" value="{{ $data->first_name }}" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Nama Belakang</label>
                                    <input type="text" class="form-control" id="lastname" value="{{ $data->last_name }}" name="last_name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <img src="{{url('/').Storage::disk('local')->url("app/".$data->avatar)}}" alt="{{ $data->first_name }}" name="avatar">
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Telephone</label>
                                    <input type="text" class="form-control" id="phone" value="{{ $data->phone_number }}" name="phone_number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" value="{{ $data->email }}" name="email">
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

@endsection