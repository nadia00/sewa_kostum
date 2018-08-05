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
                    <li>{{$ctg->name}}</li>
                </ul>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
    _________________________________________________________ -->

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Lokasi</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked category-menu">
                                <form method="get" action="{{ route('filter.category',[$ctg->id]) }}">
                                    <li>
                                        <input type="checkbox" name="kota[]" value="Bangkalan"> Bangkalan
                                    </li>
                                    <li>
                                        <input type="checkbox" name="kota[]" value="Banyuwangi"> Banyuwangi
                                    </li>
                                    <li>
                                        <input type="checkbox" name="kota[]" value="Blitar"> Blitar
                                    </li>
                                    <li>
                                        <input type="checkbox" name="kota[]" value="Bojonegoro"> Bojonegoro
                                    </li>
                                    <li>
                                        <input type="checkbox" name="kota[]" value="Bondowoso"> Bondowoso
                                    </li>
                                    <li>
                                        <input type="checkbox" name="kota[]" value="Gresik"> Gresik
                                    </li>
                                    <li>
                                        <input type="checkbox" name="kota[]" value="Jember"> Jember
                                    </li>
                                    <li>
                                        <input type="checkbox" name="kota[]" value="Jombang"> Jombang
                                    </li>
                                    <li>
                                        <input type="checkbox" name="kota[]" value="Lamongan"> Lamongan
                                    </li>
                                    <li>
                                        <input type="checkbox" name="kota[]" value="Lumajang"> Lumajang
                                    </li>

                                    <li><a href="#" data-toggle="modal" data-target="#lokasi-modal">Lihat semua lokasi</a></li>

                                    <br>
                                    <button type="submit" class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
                                </form>
                                <script>
                                    function selectCategori(data){
                                        var id = data.getAttribute('id');
                                        console.log(id)
                                    }
                                </script>
                            </ul>
                            </form>
                        </div>
                    </div>
                    <!-- *** MENUS AND FILTERS END *** -->
                </div>




                @if(sizeof($product) != 0)
                    <div class="col-md-9">
                        <div class="row products" id="row-product">
                            <?php $i = 0; ?>
                            @foreach($product as $val)
                                <div class="col-md-4 col-sm-6 product-container" id="product-container">
                                    <div class="product" id="product">
                                        <div class="flip-container" style="height: 250px;">
                                            <div class="flipper">
                                                <div class="front" style="height: 250px;padding: 10px;">
                                                    <a href="{{ route('product-detail', ['id'=>$val->id]) }}">
                                                        <img style="height: 100%; margin: 0 auto;" src="{{url('/').Storage::disk('local')->url("app/".$val->product->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                    </a>
                                                </div>
                                                <div class="back" style="height: 250px;padding: 10px;">
                                                    <a href="{{ route('product-detail', ['id'=>$val->id]) }}">
                                                        <img style="height: 100%; margin: 0 auto;" src="{{url('/').Storage::disk('local')->url("app/".$val->product->image)}}" alt="{{$val->name}}" class="img-responsive">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('product-detail', ['id'=>$val->id]) }}" class="invisible">
                                            {{--<img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">--}}
                                        </a>
                                        <div class="text">
                                            <h3><a href="{{ route('product-detail', ['id'=>$val->id]) }}">{{$val->name}}</a></h3>


                                            <p class="buttons">
                                                <a href="{{ route('product-detail', ['id'=>$val->id]) }}" class="btn btn-default"> View detail</a>
                                                {{--<a href="#" class="btn btn-primary" onclick="addToCart()"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                            </p>
                                        </div>

                                        <!-- /.text -->
                                    </div>
                                    <!-- /.product -->
                                </div>
                                <?php $i++; ?>
                            @endforeach
                        </div>
                        <!-- /.products -->
                    </div>
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
        var hash = getUrlVars();
        var host = window.location.hostname;
        var path = window.location.pathname;
        var element = $(".products-number a");

        if (hash['show'] != null){
            var select = hash['show'];
            $(".products-number a").removeClass("btn-primary");
            console.log(select);
            if(select == 12){
                $(".products-number #filter-1").addClass("btn-primary");
            }
            else if(select == 24){
                $(".products-number #filter-2").addClass("btn-primary");
            }
            else if(select == 28){
                $(".products-number #filter-3").addClass("btn-primary");
            }
            else{
                $(".products-number #filter-0").addClass("btn-primary");
            }
        }
        else{
            $(".products-number #filter-0").addClass("btn-primary");
        }

        if (element){
            $(".products-number a").click(function () {
                var idElement = this.getAttribute("id");
                var lastElement = $(".products-number").find(".btn-primary");
                $(".products-number #"+lastElement[0].id).removeClass("btn-primary");
                $(".products-number #"+idElement).addClass("btn-primary");
                var URL = path+"?show="+ $(this).text();
                var page = hash['page'];

                if(page == null){
                    page = 1;
                }
                console.log(URL+"&page="+page);

                $.ajax({
                    dataType: "json",
                    type: "GET",
                    url: URL+"&page="+page,
                    success: function (data) {
                        console.log(data);

                        $(".product-container").remove();

                        var htmlProduct =  "";

                        $.each(data.product.data, function (index, item) {

                            var route_detail = '/sewa-kostum/detail/'+item.id;
                            var img_detail = '/sewa-kostum/storage/app/'+item.image;

                            htmlProduct += '<div class="col-md-4 col-sm-6 product-container" id="product-container">';
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
                                htmlProduct += '<a href="'+route_detail+'" class="btn btn-default">View Detail</a>';
                                htmlProduct += '</p>';
                            htmlProduct += '</div>';
                            htmlProduct += '</div>';
                            htmlProduct += '</div>';

                        });

                        $("#row-product").append(htmlProduct);

                        $(".page-item").remove();

                        var htmlPaginate = "";
                        var strDisabled = "";
                        if(data.product.current_page == 1){
                            strDisabled = "disabled";
                        }
                        htmlPaginate += '<li class="page-item '+strDisabled+'">';
                        htmlPaginate += '<a class="page-link" href="'+data.product.prev_page_url+'" rel="prev">‹';
                        htmlPaginate += '</a></li>';
                        for(var i = 1; i <= data.product.last_page; i++){
                            var strActive = "";
                            if (data.product.current_page == i){
                                strActive = "active";
                            }
                            htmlPaginate += '<li class="page-item '+strActive+'">';
                            htmlPaginate += '<a class="page-link" href="http://localhost/sewa-kostum/products?show='+data.show+'&page='+i+'">';
                            htmlPaginate += i+'</a></li>';
                        }
                        htmlPaginate += '<li class="page-item">';
                        htmlPaginate += '<a class="page-link" href="'+data.product.next_page_url+'" rel="next">›</a></li>';
                        $(".pagination").append(htmlPaginate);


                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            });
        }

        function getUrlVars() {
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?')+1).split('&');
            for (var i = 0; i < hashes.length; i++) {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        }


    </script>

@endsection

