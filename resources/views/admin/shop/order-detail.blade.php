


@extends('layouts.header-footer')

@section('content')			

<section class="main-content">				
        <div class="row">						
            <div class="span9">
                <div class="row">
                    <div class="span4">
                            
                        <ul class="thumbnails small">
                            @foreach($data->gambar_kostum as $gam)							
                            <li class="span1">
                                <a href="{{url('/').Storage::disk('local')->url("app/".$gam->filepath)}}" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="{{url('/').Storage::disk('local')->url("app/".$gam->filepath)}}" alt=""></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="span5">
                        <address>
                            <h3><strong>{{$data->nama_kostum}}</strong></h3>
                            <strong>Nama Penyewa:</strong> <span>{{$data->nama_penyewa}}</span><br>
                            <strong>Tanggal Sewa:</strong> <span>{{$data->tanggal_sewa}}</span><br>
                            <strong>Jumlah Sewa:</strong> <span>{{$data->jumlah_sewa}}</span><br>							
                        </address>
                    </div>
                    <div class="span5">
                    <form action="{{ route('terimaOrder') }}" method="post">
                        <input type="hidden" name="id_sewa" value='{{$data->id_sewa}}'>
                        <button class="btn btn-inverse" type="form">Terima</button>	
                    </form>
                    <form action="{{ route('tolakOrder') }}" method="post">
                        <input type="hidden" name="id_sewa" value='{{$data->id_sewa}}'>
                        <button class="btn btn-inverse" type="form">Tolak</button>	
                    </form>    
                    </div>
                </div>
                
                <div class="row">
                    <div class="span9">	
                        <br>
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
                            <span class="pull-right">
                                <a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
                            </span>
                        </h4>
                        <div id="myCarousel-1" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails listing-products">
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>												
                                                <a href="product_detail.html"><img alt="" src="themes/images/ladies/6.jpg"></a><br/>
                                                <a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
                                                <a href="#" class="category">Suspendisse aliquet</a>
                                                <p class="price">$341</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>												
                                                <a href="product_detail.html"><img alt="" src="themes/images/ladies/5.jpg"></a><br/>
                                                <a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
                                                <a href="#" class="category">Phasellus consequat</a>
                                                <p class="price">$341</p>
                                            </div>
                                        </li>       
                                        <li class="span3">
                                            <div class="product-box">												
                                                <a href="product_detail.html"><img alt="" src="themes/images/ladies/4.jpg"></a><br/>
                                                <a href="product_detail.html" class="title">Praesent tempor sem</a><br/>
                                                <a href="#" class="category">Erat gravida</a>
                                                <p class="price">$28</p>
                                            </div>
                                        </li>												
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="thumbnails listing-products">
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>												
                                                <a href="product_detail.html"><img alt="" src="themes/images/ladies/1.jpg"></a><br/>
                                                <a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
                                                <a href="#" class="category">Phasellus consequat</a>
                                                <p class="price">$341</p>
                                            </div>
                                        </li>       
                                        <li class="span3">
                                            <div class="product-box">												
                                                <a href="product_detail.html"><img alt="" src="themes/images/ladies/2.jpg"></a><br/>
                                                <a href="product_detail.html">Praesent tempor sem</a><br/>
                                                <a href="#" class="category">Erat gravida</a>
                                                <p class="price">$28</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>												
                                                <a href="product_detail.html"><img alt="" src="themes/images/ladies/3.jpg"></a><br/>
                                                <a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
                                                <a href="#" class="category">Suspendisse aliquet</a>
                                                <p class="price">$341</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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