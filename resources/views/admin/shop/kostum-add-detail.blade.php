@extends('layouts.master')

@section('content')

    <link href="{{asset('public/page/css/style-tab.css')}}" rel="stylesheet">

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Tambah Kostum</li>
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
                                <a href="customer-orders.html"><i class="fa fa-heart"></i> Wishlist</a>
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
                                <a href="customer-orders.html"><i class="fa fa-th-list"></i> Penyewaan</a>
                            </li>
                            <li class="active">
                                <a href="{{url('/user/kostum-add')}}"><i class="fa fa-plus"></i> Tambah Kostum</a>
                            </li>
                            <li>
                                <a href="{{url('/user/kostum')}}"><i class="fa fa-list"></i> Daftar Kostum</a>
                            </li>
                            <li>
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
                    @if($kostum )
                        <div class="row">
                            <div class="col-sm-3">
                                <img class="img-thumbnail img-responsive" src="{{url('/').Storage::disk('local')->url("app/".$gambar->filepath)}}" alt="Gambar Kostum">
                            </div>
                            <div class="col-sm-9">
                                <p><strong>Nama Kostum : </strong> {{ $kostum->nama }}</p>
                                <p><strong>Keterangan : </strong> {{ $kostum->keterangan }}</p>
                            </div>
                        </div>
                    @endif

                    <h1>Tambah Detail Kostum</h1>
                    <p class="lead">Tambahkan detail kostum yang baru saja Anda masukkan.</p>
                    <p class="text-muted">Anda bisa mengisi semua ukuran atau hanya salah satu saja.</p>

                    {{--@foreach($ukuran as $val)--}}

                        {{--<div class="tab">--}}
                            {{--<button class="tablinks" onclick="openUkuran(event, 'kostum{{$val->id}}')">{{$val->nama}}</button>--}}
                        {{--</div>--}}

                        {{--<div id="kostum{{$val->id}}" class="tabcontent">--}}
                            {{--<h3>{{$val->nama}}</h3>--}}
                            {{--<p>Tambah detail kostum untuk ukuran {{$val->nama}}.</p>--}}
                            {{--<form method="POST" action="{{route('detail.add')}}">--}}
                                {{--@csrf--}}
                                {{--<input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_kostum" value="{{$id_kostum}}">--}}
                                {{--<input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_ukuran" value="{{$val->id}}">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="harga">Harga:</label>--}}
                                    {{--<input type="text" class="input-xxlarge form-control" id="harga" placeholder="Isikan harga" name="harga">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="jumlah">Jumlah Keseluruhan:</label>--}}
                                    {{--<input type="number" class="input-xxlarge form-control" id="jumlah" placeholder="Isikan jumlah keseluruhan" name="jumlah_keseluruhan">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="stok">Stok:</label>--}}
                                    {{--<input type="number" class="input-xxlarge form-control" id="stok" placeholder="Isikan stok" name="jumlah_stok">--}}
                                {{--</div>--}}
                                {{--<div>--}}
                                    {{--<button type="submit" name="submit">Submit</button>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}

                    {{--@endforeach--}}

                    <div class="tab">
                        <button class="tablinks" onclick="openUkuran(event, 'anak')">Anak</button>
                        <button class="tablinks" onclick="openUkuran(event, 'dewasa')">Dewasa</button>
                    </div>

                    <div id="anak" class="tabcontent">
                        <h3>Anak - Anak</h3>
                        <p>Tambah detail kostum untuk ukuran anak - anak.</p>
                        <form method="POST" action="{{route('detail.add')}}">
                            @csrf
                            <input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_kostum" value="{{$id_kostum}}">
                            {{--<input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_ukuran" value="{{$val->id}}">--}}
                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="text" class="input-xxlarge form-control" id="harga" placeholder="Isikan harga" name="harga">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Keseluruhan:</label>
                                <input type="number" class="input-xxlarge form-control" id="jumlah" placeholder="Isikan jumlah keseluruhan" name="jumlah_keseluruhan">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok:</label>
                                <input type="number" class="input-xxlarge form-control" id="stok" placeholder="Isikan stok" name="jumlah_stok">
                            </div>
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div id="dewasa" class="tabcontent">
                        <h3>Dewasa</h3>
                        <p>Tambah detail kostum untuk ukuran dewasa.</p>
                        <form method="POST" action="{{route('detail.add')}}">
                            @csrf
                            <input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_kostum" value="{{$id_kostum}}">
                            {{--<input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_ukuran" value="{{$val->id}}">--}}
                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="text" class="input-xxlarge form-control" id="harga" placeholder="Isikan harga" name="harga">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Keseluruhan:</label>
                                <input type="number" class="input-xxlarge form-control" id="jumlah" placeholder="Isikan jumlah keseluruhan" name="jumlah_keseluruhan">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok:</label>
                                <input type="number" class="input-xxlarge form-control" id="stok" placeholder="Isikan stok" name="jumlah_stok">
                            </div>
                            <div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                    <script>
                        function openUkuran(evt, ukuran) {
                            var i, tabcontent, tablinks;
                            tabcontent = document.getElementsByClassName("tabcontent");
                            for (i = 0; i < tabcontent.length; i++) {
                                tabcontent[i].style.display = "none";
                            }
                            tablinks = document.getElementsByClassName("tablinks");
                            for (i = 0; i < tablinks.length; i++) {
                                tablinks[i].className = tablinks[i].className.replace(" active", "");
                            }
                            document.getElementById(ukuran).style.display = "block";
                            evt.currentTarget.className += " active";
                        }
                    </script>


                </div>

            </div>

        </div>
    </div>


@endsection