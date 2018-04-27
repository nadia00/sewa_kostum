@extends('layouts.header-footer')

@section('content')
<section class="main-content">
    <div class="row">
        <div class="span9">					
            <h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
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
                        <td><a href="product_detail.html"><img src="{{url('/').Storage::disk('local')->url("app/".$order->gambar_kostum)}}" alt="{{$order->nama_kostum}}"></a></td>
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
        <div class="span3 col">
            <div class="block">	
                <ul class="nav nav-list">
                    <li class="nav-header">SUB CATEGORIES</li>
                    <li><a href="products.html">Nullam semper elementum</a></li>
                    <li class="active"><a href="products.html">Phasellus ultricies</a></li>
                    <li><a href="products.html">Donec laoreet dui</a></li>
                    <li><a href="products.html">Nullam semper elementum</a></li>
                    <li><a href="products.html">Phasellus ultricies</a></li>
                    <li><a href="products.html">Donec laoreet dui</a></li>
                </ul>
                <br/>
                <ul class="nav nav-list below">
                    <li class="nav-header">MANUFACTURES</li>
                    <li><a href="products.html">Adidas</a></li>
                    <li><a href="products.html">Nike</a></li>
                    <li><a href="products.html">Dunlop</a></li>
                    <li><a href="products.html">Yamaha</a></li>
                </ul>
            </div>
            <div class="block">
                <h4 class="title">
                    <span class="pull-left"><span class="text">Randomize</span></span>
                    <span class="pull-right">
                        <a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
                    </span>
                </h4>
                <div id="myCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="active item">
                            <ul class="thumbnails listing-products">
                                <li class="span3">
                                    <div class="product-box">
                                        <span class="sale_tag"></span>												
                                        <a href="product_detail.html"><img alt="" src="themes/images/ladies/2.jpg"></a><br/>
                                        <a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
                                        <a href="#" class="category">Suspendisse aliquet</a>
                                        <p class="price">$261</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="item">
                            <ul class="thumbnails listing-products">
                                <li class="span3">
                                    <div class="product-box">												
                                        <a href="product_detail.html"><img alt="" src="themes/images/ladies/4.jpg"></a><br/>
                                        <a href="product_detail.html" class="title">Tempor sem sodales</a><br/>
                                        <a href="#" class="category">Urna nec lectus mollis</a>
                                        <p class="price">$134</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>						
        </div>
    </div>
</section>

@endsection