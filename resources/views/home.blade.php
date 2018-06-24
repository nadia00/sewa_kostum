@extends('layouts.master')

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
                            <h2>Latest Product</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        @if(!empty($product))
                            @foreach($product as $val)
                            <div class="item">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="{{ route('user.product-detail', ['id'=>$val->id]) }}">
                                                    <img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="{{ route('user.product-detail', ['id'=>$val->id]) }}">
                                                    <img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ url('user/detail', [$val->id]) }}" class="invisible">
                                        <img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><a href="detail.html">{{$val->name}}</a></h3>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                            @endforeach
                        @else
                            <div class="row">
                                <div class="panel  col-lg-12">
                                    <div class="panel-body">No Data Found</div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- /.product-slider -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->


        </div>
        <!-- /#content -->
    </div>
@endsection