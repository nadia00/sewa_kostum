@extends('layouts.header-footer')

@section('content')
<section class="main-content">
    <div class="row">
        @foreach($data->gambar_kostum as $gam)
        <div class="col-sm-3"><img src="{{url('/').Storage::disk('local')->url("app/".$gam->filepath)}}" class="img-responsive"></div>
        @endforeach
        <div class="col-sm-9">
            <td>{{$data->nama_kostum}}</td>
            <td>{{$data->nama_penyewa}}</td>
            <td>{{$data->tanggal_sewa}}</td>
        </div>
    </div>
</section>    
@endsection