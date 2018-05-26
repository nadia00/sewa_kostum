@extends('layouts.header-footer')

@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span9">
                {{--<div class="span9">--}}
                <h4 class="title"><span class="text"><strong>Akun</strong> Anda</span></h4>
                <div class="span2">
                    <img src="{{asset('DQmP1f4FwxVNzmDLUKhvtTtimJ5ewCELqiGW7W5ae6a5H1X.jpeg')}}" alt="Foto Profil" style="max-width: 100%; max-height: 100%">
                </div>
                <div class="span5">
                    <h4>{{$data->nama}}</h4>
                    <p>{{$data->email}}</p>
                    <p>{{$data->telp}}</p>
                </div>
                <div class="clearfix"></div>
                <hr>
                {{--</div>--}}
                {{--<div class="span9">--}}
                {{--<h4 class="title"><span class="text"><strong>Toko</strong> Anda</span></h4>--}}
                <div class="span2">
                    <img src="{{asset('storage/app/image/hNVsNtJ2xtjHjdvTS6Pd9aJtIqluSeGKK8HO77z1.jpeg')}}" alt="Foto Profil" style="max-width: 100%; max-height: 100%">
                </div>
                <div class="span5">
                    <h4>{{$data->nama_toko}}</h4>
                    <p>{{$data->motto_toko}}</p>
                    <p>{{$data->telp_toko}}</p>
                    <p>{{$data->lokasi_toko}}</p>
                </div>
                <div class="clearfix"></div>
                {{--<hr>--}}
                {{--</div>--}}
            </div>

            {{-- Side Bar --}}
            <div class="span3 col">
                <div class="block">
                    <ul class="nav nav-list">
                        <li class="nav-header">Toko-ku</li>
                        <li><a href="{{route('shop')}}">Profil</a></li>
                        <li><a href="{{route('order.get')}}">Daftar Transaksi</a></li>
                        <li>Kostum</li>
                        <li><a href="{{ route('kostum.add') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> Tambah Kostum</a></li>
                        <li><a href="{{ route('kostum.get') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> Daftar Kostum</a></li>
                        <li><a href="products.html">Setting Toko</a></li>
                    </ul>
                    <br/>
                    <ul class="nav nav-list below">
                        <li class="nav-header">Akun-ku</li>
                        <li><a href="{{route('user')}}">Profil</a></li>
                        <li><a href="products.html">Request</a></li>
                        <li><a href="products.html">Daftar Sewa</a></li>
                        <li><a href="products.html">Review</a></li>
                        <li><a href="products.html">Setting</a></li>
                    </ul>
                </div>
            </div>


        </div>
    </section>

@endsection