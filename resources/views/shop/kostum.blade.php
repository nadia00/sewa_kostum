@extends('layouts.header-footer')

@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <h4 class="title"><span class="text"><strong>Tambah</strong> Kostum</span></h4>
                <a href="{{url('/user/kostum-add')}}"> <button type="button" class="btn btn-secondary btn-lg">Tambah</button></a>

                {{--<div class="row">--}}

                <div class="row">
                    @if(!empty($data))
                        @foreach($data as $kostum)
                            <a href="{{ url('user/detail', [$kostum->id_kostum]) }}">
                                <div class="span3">
                                    <div class="thumbnail">
                                        <img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar_kostum)}}" alt="{{$kostum->nama_kostum}}" class="img-responsive" style="height: 250px">
                                        <div class="caption">
                                            <table class="table">
                                                <tr>
                                                    <td colspan="3"><a href="{{ url('user/detail', [$kostum->id_kostum]) }}" class="title"><h4>{{$kostum->nama_kostum}}</h4></a></td>
                                                </tr>
                                                <tr><a href="{{ url('user/detail', [$kostum->id_kostum]) }}" class="title">
                                                    <td>Pemilik</td>
                                                    <td>:</td>
                                                    <td>Rp. {{$kostum->nama_toko}}</td>
                                                </a></tr>
                                            </table>
                                            <button class="btn btn-inverse" type="button"><a href="{{route('kostum.del',[$kostum->id_kostum])}}"> Delete</a></button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="panel panel-default">
                            <div class="panel-body center bg-danger">Tidak Ada Data</div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Side Bar --}}
            <div class="span3 col">
                <div class="block">
                    <ul class="nav nav-list">
                        <li class="nav-header">Toko-ku</li>
                        {{--<li><a href="{{route('shop')}}">Profil</a></li>--}}
                        {{--<li><a href="{{route('order.get')}}">Daftar Transaksi</a></li>--}}
                        <li>Kostum</li>
                        {{--<li><a href="{{ route('kostum.add') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> Tambah Kostum</a></li>--}}
                        {{--<li><a href="{{ route('kostum.get') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> Daftar Kostum</a></li>--}}
                        <li><a href="products.html">Setting Toko</a></li>
                    </ul>
                    <br/>
                    <ul class="nav nav-list below">
                        <li class="nav-header">Akun-ku</li>
{{--                        <li><a href="{{route('user')}}">Profil</a></li>--}}
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