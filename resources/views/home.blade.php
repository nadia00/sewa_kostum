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
                            <a href="{{ url('user/detail', [$kostum->id_kostum]) }}"><div class="panel-footer"><button class="btn btn-success">Detail</button></div></a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="panel panel-default">
                    <div class="panel-body center bg-danger">Tidak Ada Data</div>
                </div>
            @endif
        </div>
    </div>

@endsection
