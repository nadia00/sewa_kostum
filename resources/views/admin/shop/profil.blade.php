@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Toko</li>
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
                                <a href="customer-orders.html"><i class="fa fa-th-list"></i> Penyewaan</a>
                            </li>
                            <li>
                                <a href="{{url('/user/kostum-add')}}"><i class="fa fa-plus"></i> Tambah Kostum</a>
                            </li>
                            <li>
                                <a href="{{url('/user/kostum')}}"><i class="fa fa-list"></i> Daftar Kostum</a>
                            </li>
                            <li class="active">
                                <a href="{{url('/user/myshop')}}"><i class="fa fa-user"></i> Toko</a>
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
                    <h1>Toko Saya</h1>
                    <p class="lead">Change your personal details or your password here.</p>
                    <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                    <h3>Personal details</h3>
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="firstname">Nama</label>
                                    <input type="text" class="form-control" id="name" value="{{$data->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="firstname">Description</label>
                                    <input type="text" class="form-control" id="description" value="{{$data->description}}">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Lokasi</label>
                                    <textarea class="form-control" id="comment" rows="4" value="{{$data->district}}"></textarea>
                                    {{--<input type="text" class="form-control" id="phone" {{$data->telp_toko}}>--}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Telephone</label>
                                    <input type="text" class="form-control" id="phone" value="{{$data->phone}}">
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                            </div>
                        </div>
                    </form>

                    <h3>Aktivitas Anda</h3>
                    <div class="row comment">
                        <div class="col-sm-9 col-md-10">
                            <h5>{{$data->name}}</h5>
                            <p class="posted"><i class="fa fa-clock-o"></i> {{$data->created_at}}</p>
                        </div>
                        <div class="col-sm-3">
                            <p>Jumlah Kostum</p>
                            <p>Pesanan Diterima</p>
                            <p>Pesanan Ditolak</p>
                        </div>
                        <div class="col-sm-2">
                            <p> : </p>
                            <p> : </p>
                            <p> : </p>
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