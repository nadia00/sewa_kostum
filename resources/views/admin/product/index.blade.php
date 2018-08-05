@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Daftar Kostum</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Customer section</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="{{route('admin-shop.order')}}"><i class="fa fa-th-list"></i> Penyewaan</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.rekap')}}"><i class="fa fa-table"></i> Rekap Sewa</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.add-product')}}"><i class="fa fa-plus"></i> Tambah Kostum</a>
                            </li>
                            <li class="active">
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

            <div class="col-md-9" style="margin-bottom: 1%">
                <a href="{{route('admin-shop.add-product')}}"> <button type="button" class="btn btn-default btn-lg"><i class="fa fa-plus"></i> Tambah Kostum</button></a>
            </div>

            @if(sizeof($product) != 0)
                <div class="col-md-9">
                    <div class="row products">
                        @foreach($product as $val)
                            <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="flip-container" style="height: 300px;">
                                        <div class="flipper">
                                            <div class="front" style="height: 250px;padding: 10px;">
                                                <a href="{{ route('product-detail', ['id'=>$val->id]) }}">
                                                    <img style="height: 100%; margin: 0 auto;" src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back" style="height: 250px;padding: 10px;">
                                                <a href="{{ route('product-detail', ['id'=>$val->id]) }}">
                                                    <img style="height: 100%; margin: 0 auto;" src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name }}" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('product-detail', ['id'=>$val->id]) }}" class="invisible">
{{--                                        <img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">--}}
                                    </a>
                                    <div class="text">
                                        <h3><a href="{{ route('product-detail', ['id'=>$val->id]) }}}">{{$val->name}}</a></h3>
                                        <p class="buttons">
                                            <a href="{{ route('admin-shop.edit-product',['id'=>$val->id]) }}" class="btn btn-default"><i class="fa fa-edit"></i> Update</a>
                                            <a href="{{route('delete-product',[$val->id])}}" class="btn btn-primary"><i class="fa fa-eraser"></i> Delete</a>
                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                        @endforeach
                    </div>
                    <!-- /.products -->

                    {{--<div class="pages">--}}
                        {{--<ul class="pagination">--}}
                            {{--<li><a href="#">&laquo;</a>--}}
                            {{--</li>--}}
                            {{--<li class="active"><a href="#">1</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">2</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">3</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">4</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">5</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">&raquo;</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}

                </div>
                <!-- /.col-md-9 -->

            @else
                <div class="col-md-9">
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 products-showing">
                                Belum Ada Data
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection