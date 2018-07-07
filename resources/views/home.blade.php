@extends('layouts.master')

@section('custom_css')

@endsection

@section('content')

    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="{{asset('public/page/img/main-slider1.jpg')}}" alt="" class="img-responsive">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Product</h2>
                        </div>
                    </div>
                </div>

                @if(sizeof($product) != 0)
                    <div class="container">
                        <div class="product-slider">
                            @foreach($product as $val)
                                <div class="item">
                                    <div class="product">
                                        <div class="flip-container" style="height: 250px;">
                                            <div class="flipper">
                                                <div class="front" style="height: 250px;padding: 10px;">
                                                    <a href="{{ route('user.product-detail', ['id'=>$val->id]) }}">
                                                        <img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="back" style="height: 250px;padding: 10px;">
                                                    <a href="{{ route('user.product-detail', ['id'=>$val->id]) }}">
                                                        <img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ url('user/detail', [$val->id]) }}" class="invisible">
{{--                                            <img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">--}}
                                        </a>

                                        <div class="text">
                                            <h3><a href="{{ route('user.product-detail', ['id'=>$val->id]) }}">{{$val->name}}</a></h3>

                                            <div class="text-center" style="margin-top: -10%;">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>

                                        </div>
                                        <!-- /.text -->
                                    </div>
                                    <!-- /.product -->
                                </div>
                            @endforeach

                        </div>
                        <!-- /.product-slider -->
                    </div>
                    <!-- /.container -->

                @else
                    <div class="container">
                        <div class="row">
                            <div class="panel col-lg-12">
                                <div class="panel-body">Tidak Ada Kostum</div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->


        </div>
        <!-- /#content -->
    </div>
@endsection