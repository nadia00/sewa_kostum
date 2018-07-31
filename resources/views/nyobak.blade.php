@extends('layouts.master')

@section('custom_css')

@endsection

@section('content')

    <div class="content">
        <div class="container">
            <div class="col-sm-12">
                <div class="col-sm-3">
                    @if($shop->image == null)
                        <img src="{{asset('public/page/img/shop.png')}}" class="img-responsive img-thumbnail img-rounded" style="width: 200px; height: 200px;">
                    @else
                        <img src="{{url('/').Storage::disk('local')->url("app/".$shop->image)}}" class="img-responsive img-thumbnail img-rounded" style="width: 200px; height: 200px;">
                    @endif
                </div>
                <div class="col-sm-9" style="padding-left: 0">
                    <h1>{{$shop->name}}</h1>
                    <h4><q>{{$shop->description}}</q></h4>
                    <p><i class="fa fa-location-arrow"></i> {{$shop->street}}, {{$shop->city}}, {{$shop->country}}</p>
                    <p><i class="fa fa-phone"></i> {{$shop->phone}}</p>
                    <p><i class="fa fa-clock-o"></i> {{date("Y-m-d",strtotime($shop->created_at))}}</p>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class="kualitas">

                    </div>
                    <p>Hasil : {{$total_value}}</p>
                    @for($i=0;$i<5;$i++)
                        <p>Bintang {{$i+1}} : {{$star[$i]}}</p>
                    @endfor
                </div>
                <div class="col-sm-6">
                    <p>Produk disewa</p>
                    <p>Total : {{$order}}</p>
                    <p>1 Bulan : {{$order1bln}}</p>
                    <p>3 Bulan : {{$order3bln}}</p>
                    <p>6 Bulan : {{$order6bln}}</p>
                </div>
            </div>


        </div>
    </div>

@endsection