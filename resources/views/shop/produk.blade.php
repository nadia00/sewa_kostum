@extends('layouts.header-footer')

@section('content')
<section class="main-content">
    <div class="row">
        <div class="span9">					
            <h4 class="title"><span class="text"><strong>Your</strong> Costume</span></h4>
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Tambah</button>
            @if(!empty($data))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Kostum</th>
                        <th>Harga</th>
                        <th>Stok Tersedia</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $kostum)
                    <tr>
                        <td><a href="product_detail.html">
                                <img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar_kostum)}}" class="img-responsive center-block" alt="Image">
                        </a></td>
                        <td>{{$kostum->nama_kostum}}</td>
                        <td>{{$kostum->harga}}</td>
                        <td>{{$kostum->stok}}</td>
                        <td><a href="{{ url('/detail', [$kostum->id_kostum]) }}">Lihat</a></td>
                        <td><a href="{{ url('/delete', [$kostum->id_kostum]) }}">Hapus</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="panel panel-default">
                <div class="panel-body center bg-danger">Tidak ada data</div>
            </div>
            @endif
            <hr>
                
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Masukan Kostum</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('shop.add') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_toko" value="{{\App\Models\Toko::all()->firstWhere('id_penjual','=',Auth::user()->id)->id}}">
                                <div class="form-group">
                                    <label for="username">Nama Kostum:</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Enter username" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="username">Kategori:</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Enter username" name="id_kategori">
                                </div>
                                <div class="form-group">
                                    <label for="username">Keterangan:</label>
                                    <input type="text" class="form-control" id="keterangan" placeholder="Enter username" name="keterangan">
                                </div>
                                <div class="form-group">
                                    <label for="username">Harga:</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Enter username" name="harga">
                                </div>
                                <div class="form-group">
                                    <label for="username">Jumlah Keseluruhan Kostum:</label>
                                    <input type="text" class="form-control" id="jumlah" placeholder="Enter username" name="jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="username">Stok Ready:</label>
                                    <input type="text" class="form-control" id="stok" placeholder="Enter username" name="stok">
                                </div>
                                <h3>Tambah Gambar</h3>
                                <div class="form-group">
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