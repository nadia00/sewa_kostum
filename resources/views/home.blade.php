@extends('layouts.master')

@section('content')

    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="{{asset('public/page/img/Home.png')}}" alt="" class="img-responsive">
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

                @if(sizeof($product) != 0)
                    <div class="container">
                        <div class="product-slider">
                            <?php $i=0 ?>
                            @foreach($product as $val)
                                @if($i==9)
                                    @break;
                                @endif
                                <div class="item">
                                    <div class="product">
                                        <div class="flip-container" style="height: 200px;">
                                            <div class="flipper">
                                                <div class="front" style="height: 200px;padding: 10px;">
                                                    <a href="{{ route('product-detail', ['id'=>$val->id]) }}">
                                                        <img style="height: 100%; margin: 0 auto;" src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="back" style="height: 200px;padding: 10px;">
                                                    <a href="{{ route('product-detail', ['id'=>$val->id]) }}">
                                                        <img style="height: 100%; margin: 0 auto;" src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ url('detail', [$val->id]) }}" class="invisible">
                                        </a>

                                        <div class="text">
                                            <h3><a href="{{ route('product-detail', ['id'=>$val->id]) }}">{{$val->name}}</a></h3>

                                            <div class="text-center">
                                                <?php $j=0 ?>
                                                @for($j; $j<$reviews[$i]['review']; $j++)
                                                    <span class="fa fa-star checked"></span>
                                                @endfor
                                                <?php $j=0 ?>
                                                @for($j; $j<$reviews[$i]['rest_review']; $j++)
                                                    <span class="fa fa-star"></span>
                                                @endfor
                                            </div>

                                        </div>
                                        <!-- /.text -->
                                    </div>
                                    <!-- /.product -->
                                </div>
                            <?php $i++ ?>
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