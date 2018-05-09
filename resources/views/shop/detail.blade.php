@extends('layouts.header-footer')

@section('content')			

<section class="main-content">				
    <div class="row">						
        <div class="span9">
            <div class="row">
                <div class="span4">
                    <a href="{{url('/').Storage::disk('local')->url("app/".$data->gambar[0]->filepath)}}" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="{{url('/').Storage::disk('local')->url("app/".$data->gambar[0]->filepath)}}"></a>												
                    <ul class="thumbnails small">
                        @foreach($data->gambar as $gam)								
                        <li class="span1">
                            <a href="{{url('/').Storage::disk('local')->url("app/".$gam->filepath)}}" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="{{url('/').Storage::disk('local')->url("app/".$gam->filepath)}}" alt=""></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="span5">
                    <address>
                        <h3><strong>{{$data->nama_kostum}}</strong></h3>
                        <strong>Kategori:</strong> <span>{{$data->nama_kostum}}</span><br>
                        <strong>Pemilik Jasa:</strong> <span>{{$data->nama_toko}}</span><br>							
                    </address>									
                    <h4><strong>Harga: Rp{{$data->harga}}</strong></h4>
                </div>
                <div class="span5">
                    <form class="form-inline">
                            <p>&nbsp;</p>
                            <label>Ready Stock:</label>
                            <input type="text" disabled class="span1" placeholder="{{$data->stok}}">
                        @role('user-seller')
                        @if($data->id_toko != \App\Models\Toko::all()->firstWhere('id_penjual','=',Auth::user()->id)->id)    
                            <button class="btn btn-inverse" type="button" data-toggle="modal" data-target="#sewa">Sewa</button>
                        @else
                            <button class="btn btn-inverse" type="button" data-toggle="modal" data-target="#edit">Edit</button>
                        @endif
                        @endrole
                        @role('user')
                            <button class="btn btn-inverse" type="button" data-toggle="modal" data-target="#sewa">Sewa</button>
                        @endrole
                    </form>
                </div>							
            </div>

            <!-- Modal Sewa -->
            <div id="sewa" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Sewa</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('user.transaction') }}">
                                {{ csrf_field() }}
                                <input class="form-control" type="hidden" id="nama" name="id_toko" value="{{$data->id_toko}}">
                                <input class="form-control" type="hidden" id="nama" name="id_penyewa" value="{{Auth::user()->id}}">
                                <input class="form-control" type="hidden" id="nama" name="id_kostum" value="{{$data->id_kostum}}">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control" id="jumlah" placeholder="Enter jumlah" name="jumlah_sewa">
                                </div>
                                <div class="form-group">
                                    <label for="pengambilan">Tanggal Pemakaian</label>
                                    <input type="date" class="form-control" id="pengambilan" placeholder="Pemakaian" name="pemakaian" value="{{date("Y-m-d H:i:s")}}">
                                </div>
                                <div class="form-group">
                                    <label for="pengambilan">Lama Pemakaian</label>
                                    <input type="number" class="form-control" id="pengambilan" placeholder="Lama" name="lama_pemakaian" value="{{date("Y-m-d H:i:s")}}">
                                </div>
                                <div class="form-group">
                                    <label for="pengambilan">Tanggal Kembali</label>
                                    <input type="date" class="form-control" id="pengambilan" placeholder="Pengambilan" name="tenggang_pengembalian" value="{{date("Y-m-d H:i:s")}}">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div id="edit" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content"> 
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('shop.add') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_toko" value="{{$data->id_toko}}">
                                <div class="form-group">
                                    <label for="jumlah">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Edit Nama Kostum" name="nama" value="{{$data->nama_kostum}}">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Kategori</label>
                                    <input type="text" class="form-control" id="jumlah" placeholder="Enter username" name="kategori" value="{{$data->kategori}}">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Deskripsi</label>
                                    <input type="text" class="form-control" id="jumlah" placeholder="Enter username" name="deskripsi" value="{{$data->deskripsi_kostum}}">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Harga</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukan Harga" name="harga" value="{{$data->harga}}">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Stok</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukan Harga" name="harga" value="{{$data->stok}}">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Tambah Gambar</label>
                                    <input type="file" class="form-control" id="stok" placeholder="Pilih Gambar" name="gambar[]" multiple>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="span9">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#deskripsi">Deskripsi</a></li>
                        <li class=""><a href="#review">Review</a></li>
                    </ul>							 
                    <div class="tab-content">
                        <div class="tab-pane active" id="deskripsi">{{$data->deskripsi_kostum}}</div>
                        <div class="tab-pane" id="review">
                            <table class="table table-striped shop_attributes">	
                                <tbody>
                                    <tr class="">
                                        <th>Size</th>
                                        <td>Large, Medium, Small, X-Large</td>
                                    </tr>		
                                    <tr class="alt">
                                        <th>Colour</th>
                                        <td>Orange, Yellow</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>							
                </div>						
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