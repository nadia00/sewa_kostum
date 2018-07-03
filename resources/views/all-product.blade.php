@extends('layouts.master')

@section('custom_css')

@endsection

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>All Categories</li>
                </ul>

                @if(sizeof($product) != 0)
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>12</strong> of <strong>25</strong> products
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Show</strong>
                                                <?php $arr = array('6','12','24','All') ?>
                                                @for($i=0; $i< sizeof($arr); $i++)
                                                    <a href="#" id="filter-{{$i}}" class=" btn btn-default btn-sm">{{ $arr[$i] }}</a>
                                                @endfor
                                                products
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sort by</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row products" id="row-product">
                        @foreach($product as $val)
                            <div class="col-md-3 col-sm-4 product-container" id="product-container">
                                <div class="product" id="product">
                                    <div class="flip-container" style="height: 250px;">
                                        <div class="flipper">
                                            <div class="front" style="height: 250px;padding: 10px;">
                                                <a href="{{ route('user.product-detail', ['id'=>$val->id]) }}">
                                                    <img style="height: 100%; margin: 0 auto;" src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back" style="height: 250px;padding: 10px;">
                                                <a href="{{ route('user.product-detail', ['id'=>$val->id]) }}">
                                                    <img style="height: 100%; margin: 0 auto;" src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('user.product-detail', ['id'=>$val->id]) }}" class="invisible">
                                        {{--<img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">--}}
                                    </a>
                                    <div class="text">
                                        <h3><a href="{{ route('user.product-detail', ['id'=>$val->id]) }}">{{$val->name}}</a></h3>
                                        <p class="buttons">
                                            <a href="detail.html" class="btn btn-default"><i class="fa fa-heart-o"></i> Wishlist</a>
                                            <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </p>
                                    </div>

                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                        @endforeach
                    </div>
                    <!-- /.products -->

                    {{ $product->links() }}

                @else
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 products-showing text-center">
                                Tidak ada kostum
                            </div>
                        </div>
                    </div>
                @endif

            </div>
            <!-- /.col-md-9 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

@endsection

@section('custom_js')

    <script>
        var host = window.location.hostname;
        var path = window.location.pathname;
        var element = $(".products-number a");
        if (element){
            $(".products-number #filter-0").addClass("btn-primary");
            $(".products-number a").click(function () {
                var idElement = this.getAttribute("id");
                var lastElement = $(".products-number").find(".btn-primary");
                $(".products-number #"+lastElement[0].id).removeClass("btn-primary");
                $(".products-number #"+idElement).addClass("btn-primary");
                var URL = path+"/"+ $(this).text();

                $.ajax({
                    dataType: "json",
                    type: "GET",
                    url: URL,
                    success: function (data) {
                        console.log(data);

                        $(".product-container").remove();

                        var htmlProduct =  "";

                        $.each(data.product.data, function (index, item) {

                            var route_detail = '/sewa-kostum/user/detail/'+item.id;
                            var img_detail = '/sewa-kostum/storage/app/'+item.image;

                            htmlProduct += '<div class="col-md-3 col-sm-4" id="product-container">';
                            htmlProduct += '<div class="product" id="product">';
                            htmlProduct += '<div class="flip-container" style="height: 250px;">';
                                htmlProduct += '<div class="flipper">';
                                    htmlProduct += '<div class="front" style="height: 250px;padding: 10px;">';
                                        htmlProduct += '<a href="'+route_detail+'">';
                                            htmlProduct += '<img style="height: 100%; margin: 0 auto;" src="'+img_detail+'" alt="'+ item.name + '" class="img-responsive">';
                                        htmlProduct += '</a>';
                                    htmlProduct += '</div>';
                                    htmlProduct += '<div class="back" style="height: 250px;padding: 10px;">';
                                        htmlProduct += '<a href="">';
                                            htmlProduct += '<img style="height: 100%; margin: 0 auto;" src="'+img_detail+'" alt="'+ item.name + '" class="img-responsive">';
                                        htmlProduct += '</a>';
                                    htmlProduct += '</div>';
                                htmlProduct += '</div>';
                            htmlProduct += '</div>';
                            htmlProduct += '<a href="" class="invisible">';
                                // htmlProduct += '<img src="'+img_detail+'" alt="'+ item.name +'" class="img-responsive">';
                            htmlProduct += '</a>';
                            htmlProduct += '<div class="text">';
                                htmlProduct += '<h3><a href="'+route_detail+'">'+item.name+'</a></h3>';
                                htmlProduct += '<p class="buttons">';
                                    htmlProduct += '<a href="detail.html" class="btn btn-default"><i class="fa fa-heart-o"></i> Wishlist</a>';
                                    htmlProduct += '<a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                                htmlProduct += '</p>';
                            htmlProduct += '</div>';
                            htmlProduct += '</div>';
                            htmlProduct += '</div>';

                        });

                        $("#row-product").append(htmlProduct);


                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            });
        }

    </script>

@endsection

