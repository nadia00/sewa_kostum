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
                                <a href="{{route('admin-shop.order')}}"><i class="fa fa-th-list"></i> Penyewaan</a>
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
                    <p class="lead">Change your Shop details.</p>

                    <h3>Shop details</h3>
                    <form action="{{route('admin-shop.edit-profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="shop_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="firstname">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telephone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$data->phone}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <img src="{{url('/').Storage::disk('local')->url("app/".$data->image)}}" alt="{{ $data->name }}" name="avatar" class="img-responsive img-thumbnail" style="height: 100px; width: 100px; margin: auto;">
                                    <input type="file" name="pic" class="form-control" value="{{$data->image}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="firstname">Description</label>
                                    <textarea type="text" class="form-control" rows="3" id="description" name="description">{{$data->description}}</textarea>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Street</label>
                                    <textarea class="form-control" id="comment" rows="5" name="street">{{$data->street}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">City</label>
                                    <input class="form-control" id="comment" name="city" value="{{$data->city}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Country</label>
                                    <input class="form-control" id="comment" name="country" value="{{$data->country}}">
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
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