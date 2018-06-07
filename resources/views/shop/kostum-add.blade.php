@extends('layouts.master')

@section('content')

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
                    <h1>Tambah Kostum</h1>
                    <p class="lead">Tambahkan kostum yang belum Anda masukkan.</p>
                    <p class="text-muted">Pilihan ukuran dan detail lainnya ada di langkah berikutnya.</p>

                    <h3>Personal details</h3>
                    <form method="POST" action="{{ route('kostum.add') }}" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_toko" value="{{\App\Models\Toko::all()->firstWhere('id_user','=',Auth::user()->id)->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nama">Nama Kostum</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" rows="4" name="keterangan"></textarea>
                                    <p>*Isikan detail ukuran dsb.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori[]" id="kategori" multiple>
                                        @foreach($kategori as $val)
                                            <option value="{{$val->id}}">{{$val->nama}}</option>
                                        @endforeach
                                    </select>
                                    <p>*Tahan tombol Ctrl untuk memilih >1 kategori.</p>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h3>Tambah Gambar</h3>
                                    <p class="lead">Anda bisa memilih beberapa gambar sekaligus.</p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gambar">Pilih Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar[]" multiple>
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
    </div>

@endsection