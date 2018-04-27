@extends('layouts.master')
<style>
    .img-responsive {
        width: auto !important;
        height: 200px !important;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Tambah</button>
        </div><br>
        <div class="row">
            @if(!empty($data))
                @foreach($data as $kostum)
                    <div class="col-sm-3 col-xs-6 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">{{$kostum->nama_kostum}}</div>
                            <div class="panel-body">
                                <img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar_kostum)}}" class="img-responsive center-block" alt="Image">
                                <table class="table table-responsive">
                                    <tr><td>Harga</td><td>:</td><td>Rp. {{$kostum->harga}},-</td></tr>
                                    <tr><td>Stok Tersedia</td><td>:</td><td>{{$kostum->stok}}</td></tr>
                                </table>
                            </div>
                            <a href="{{ url('/detail', [$kostum->id_kostum]) }}"><div class="panel-footer"><button class="btn btn-success">Edit</button></div></a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="panel panel-default">
                    <div class="panel-body center bg-danger">Tidak Ada Data</div>
                </div>
            @endif
        </div>

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

@endsection
