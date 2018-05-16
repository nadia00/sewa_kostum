@extends('layouts.header-footer')

@section('content')

<section class="main-content">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12">
                    <h4 class="title">
                        <span class="pull-left"><span class="text"><span class="line">All <strong>Costumes</strong></span></span></span>
                        <span class="pull-right">
                            <a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
                        </span>
                    </h4>
                    <div class="row">
                        @if(!empty($data))
                            @foreach($data as $kostum)
                                <a href="{{ url('user/detail', [$kostum->id_kostum]) }}">
                                <div class="span3">
                                    <div class="thumbnail">
                                            <img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar_kostum)}}" alt="{{$kostum->nama_kostum}}" class="img-responsive" style="height: 250px">
                                            <div class="caption">
                                                <table class="table">
                                                    <tr>
                                                        <td><a href="{{ url('user/detail', [$kostum->id_kostum]) }}" class="title">{{$kostum->nama_kostum}}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="{{ url('user/detail', [$kostum->id_kostum]) }}" class="category">{{$kostum->kategori}}</a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                                </a>
                            @endforeach
                    </div>
                        @else
                            <div class="panel panel-default">
                                <div class="panel-body center bg-danger">Tidak Ada Data</div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="span12">
                    <h4 class="title">
                        <span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
                        <span class="pull-right">
                            <a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
                        </span>
                    </h4>
                    <div class="row">
                        @if(!empty($data))
                            @foreach($data as $kostum)
                                <a href="{{ url('user/detail', [$kostum->id_kostum]) }}">
                                    <div class="span3">
                                        <div class="thumbnail">
                                            <img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar_kostum)}}" alt="{{$kostum->nama_kostum}}" class="img-responsive" style="height: 250px">
                                            <div class="caption">
                                                <table class="table">
                                                    <tr>
                                                        <td><a href="{{ url('user/detail', [$kostum->id_kostum]) }}" class="title">{{$kostum->nama_kostum}}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="{{ url('user/detail', [$kostum->id_kostum]) }}" class="category">{{$kostum->kategori}}</a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                    </div>
                    @else
                        <div class="panel panel-default">
                            <div class="panel-body center bg-danger">Tidak Ada Data</div>
                        </div>
                    @endif

                </div>
            </div>
            <div class="row feature_box">
                <div class="span4">
                    <div class="service">
                        <div class="responsive">
                            <img src="themes/images/feature_img_2.png" alt="" />
                            <h4>MODERN <strong>DESIGN</strong></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="service">
                        <div class="customize">
                            <img src="themes/images/feature_img_1.png" alt="" />
                            <h4>FREE <strong>SHIPPING</strong></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="service">
                        <div class="support">
                            <img src="themes/images/feature_img_3.png" alt="" />
                            <h4>24/7 LIVE <strong>SUPPORT</strong></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection