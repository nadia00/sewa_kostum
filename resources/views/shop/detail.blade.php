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
            @if(!empty($data))
                <div class="col-sm-3 col-xs-6 ">
                    <div class="panel-footer">{{$data->nama_kostum}}</div>
                    @foreach($data->gambar as $gam)
                        <img src="{{url('/').Storage::disk('local')->url("app/".$gam->filepath)}}" class="img-responsive">
                    @endforeach
                    @role('user-seller')
                    @if($data->id_toko != \App\Models\Toko::all()->firstWhere('id_penjual','=',Auth::user()->id)->id)
                        <div class="panel-footer">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#buy">Beli</button>
                        </div>
                    @else
                        <div class="panel-footer">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#edit">Edit</button>
                        </div>
                    @endif
                    @endrole
                    @role('user')
                        <div class="panel-footer">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#buy">Beli</button>
                        </div>
                    @endrole
                </div>
                <!-- Modal Buy -->
                <div id="buy" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Beli</h4>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('user.transaction') }}">
                                    {{ csrf_field() }}
                                    <input class="form-control" type="" id="nama" name="id_toko" value="{{$data->id_toko}}">
                                    <input class="form-control" type="" id="nama" name="id_pembeli" value="{{Auth::user()->id}}">
                                    <input class="form-control" type="" id="nama" name="id_kostum" value="{{$data->id_kostum}}">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="text" class="form-control" id="jumlah" placeholder="Enter jumlah" name="jumlah_sewa">
                                    </div>
                                    <div class="form-group">
                                        <label for="pengambilan">Tanggal Ambil</label>
                                        <input type="date" class="form-control" id="pengambilan" placeholder="Pengambilan" name="pemakaian" value="{{date("Y-m-d H:i:s")}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="pengambilan">Tanggal Ambil</label>
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

            @else
                <div class="panel panel-default">
                    <div class="panel-body center bg-danger">Tidak Ada Data</div>
                </div>
            @endif
        </div>
    </div>

@endsection
