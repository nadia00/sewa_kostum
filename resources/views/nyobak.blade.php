@extends('layouts.header-footer')

@section('content')
<section class="main-content">
    <div class="row">
        <div class="span9">					
            <h4 class="title"><span class="text"><strong>Your</strong> Profile</span></h4>
            <div class="span3" style="max-width:50%; max-height:50%">
                <img src="{{asset('../storage/app/image/GPiJnOivmLozaBtR8Y29AsImRFLSHeh0WcxbaI9w.png')}}" alt="Foto Profil">
            </div>
            <div class="span6">
                <h4>Nama</h4>
            </div>
            
            <hr>				
        </div>
        
        {{-- Side Bar --}}
        <div class="span3 col">
            <div class="block">	
                <ul class="nav nav-list">
                    <li class="nav-header">Toko-ku</li>
                    <li><a href="">Profil</a></li>
                    <li>Penyewaan</li>
                    <li><a href="{{ url('/user/myshop-order-list') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> Pesanan</a></li>
                    <li><a href="products.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> Daftar Transaksi</a></li>
                    <li><a href="{{ route('user.shop') }}">Kostum</a></li>
                    {{-- <li><a href="{{ route('user.shop') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> Tambah Kostum</a></li>
                    <li><a href="{{ route('user.shop') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> Daftar Kostum</a></li> --}}
                    <li><a href="products.html">Setting Toko</a></li>
                </ul>
                <br/>
                <ul class="nav nav-list below">
                    <li class="nav-header">Akun-ku</li>
                    <li><a href="products.html">Profil</a></li>
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