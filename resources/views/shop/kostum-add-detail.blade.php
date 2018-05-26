@extends('layouts.header-footer')

@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <h4 class="title"><span class="text"><strong>Tambah</strong> Kostum</span></h4>
                <div class="span8" style="padding-left: 3%">
                    @if($kostum )
                                <img class="img-responsive" style="width: 100px" src="{{url('/').Storage::disk('local')->url("app/".$gambar->filepath)}}" alt="Foto Profil">
                                    {{ $kostum->nama }}
                                    {{ $kostum->keterangan }}
                    @endif
                    <br>
                    @foreach($ukuran as $val)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$val->id}}">
                            {{$val->nama}}
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('detail.add')}}">
                                            @csrf
                                            <input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_kostum" value="{{$id_kostum}}">
                                            <input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_ukuran" value="{{$val->id}}">
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
                                                <button type="submit" name="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                {{--<hr>--}}
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
                        {{--<li><a href="{{route('user')}}">Profil</a></li>--}}
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
