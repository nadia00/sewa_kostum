@extends('layouts.header-footer')

@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <h4 class="title"><span class="text"><strong>Tambah</strong> Kostum</span></h4>
                <div class="span8" style="padding-left: 3%">
                    <form method="POST" action="{{ route('kostum.add') }}" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="hidden" id="nama" placeholder="Enter username" name="id_toko" value="{{\App\Models\Toko::all()->firstWhere('id_user','=',Auth::user()->id)->id}}">
                        <div class="form-group">
                            <label for="nama">Nama Kostum:</label>
                            <input type="text" class="input-xxlarge form-control" id="nama" placeholder="Isikan nama kostum" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <textarea class="input-xxlarge form-control" id="keterangan" placeholder="Isikan keterangan" name="keterangan"></textarea>
                            <p>*Isikan data ukuran kostum atau keterangan lainnya.</p>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori:</label>
                            <select name="kategori[]" id="kategori" multiple>
                                @foreach($kategori as $val)
                                    <option value="{{$val->id}}">{{$val->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h5>Tambah Gambar</h5>
                        <div class="form-group">
                            <input type="file" class="input-xxlarge form-control" id="gambar" placeholder="Pilih Gambar" name="gambar[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
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

    <script>
        $('#kategori').multiSelect();
    </script>

@endsection