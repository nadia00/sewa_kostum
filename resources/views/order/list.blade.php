@extends('layouts.header-footer')

@section('content')
<section class="main-content">
    <div class="row">
        <div class="span9">					
            <h4 class="title"><span class="text"><strong>Your</strong> Order</span></h4>
            @if(!empty($data))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Kostum</th>
                        <th>Penyewa</th>
                        <th>Tanggal Pesan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $order)
                    <tr>
                        <td><a href="product_detail.html">
                            <img src="{{url('/').Storage::disk('local')->url("app/".$order->gambar_kostum)}}" 
                            alt="{{$order->nama_kostum}}" style="width:100px; height:100px">
                        </a></td>
                        <td>{{$order->nama_kostum}}</td>
                        <td>{{$order->nama_penyewa}}</td>
                        <td>{{$order->tanggal_sewa}}</td>
                        <td><a href="{{ url('user/myshop-order-detail', [$order->id_sewa]) }}">Lihat</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="panel panel-default">
                <div class="panel-body center bg-danger">Belum ada pesanan baru</div>
            </div>
            @endif
            
            <hr>
            					
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