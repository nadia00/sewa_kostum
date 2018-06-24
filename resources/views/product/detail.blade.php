@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    @foreach($categories as $val)
                        <li><a href="#">{{$val->name}}</a>
                    @endforeach
                    </li>
                    <li>{{$product->name}}</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <li>
                                <a href="#">All Categories <span class="badge pull-right">42</span></a>
                            </li>
                            <li class="active">
                                <a href="#" id="2" onclick="selectCategori(this)">Adat  <span class="badge pull-right">123</span></a>
                            </li>
                            <li>
                                <a href="#" id="3" onclick="selectCategori(this)">Tari  <span class="badge pull-right">11</span></a>
                            </li>
                            <li>
                                <a href="#" id="4" onclick="selectCategori(this)">Juang  <span class="badge pull-right">11</span></a>
                            </li>
                            <li>
                                <a href="#" id="5" onclick="selectCategori(this)">Absensi  <span class="badge pull-right">11</span></a>
                            </li>
                        </ul>
                        <script>
                                function selectCategori(data){
                                    var id = data.getAttribute('id');
                                    console.log(id)
                                }
                        </script>
                    </div>
                </div>

            </div>

            <div class="col-md-9">

                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <img src="{{url('/').Storage::disk('local')->url("app/".$product->image)}}" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center">{{$product->name}}</h1>
                            <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                            </p>

                            <p>Ukuran :</p>
                            <?php $i=true?>
                            @foreach($product->productSizes as $val)
                                <button class="btn btn-default btn-click" size="{{$val->size->id}}" id="size{{$val->id}}" stock="{{$val->quantity}}" value="{{$val->price}}" onclick="getPrice(this)">{{$val->size->name}}</button>
                                @if($i === true)
                                    <?php $temp_price = $val->id;$i=false?>
                                @endif
                            @endforeach
                            <p class="price">Rp <span id="add-price"></span></p>
                            <div class="row">
                                <div class="col-lg-4 col-lg-offset-4 text-center">
                                    <p class="form-group">Jumlah :<input class="form-control" placeholder="jumlah" id="qty" type="number" min="1" value="1"></p>
                                    <p class="form-group">Lama Sewa :<input class="form-control" placeholder="lama sewa" id="duration" type="number" min="1" value="1"></p>
                                </div>
                            </div>
                            <script>
                                var active = $("#size{{$temp_price}}");
                                var val = $("#size{{$temp_price}}").attr("value");
                                var qty = $("#size{{$temp_price}}").attr("stock");
                                $(".btn-click").attr('class','btn btn-default btn-click');
                                $("#size{{$temp_price}}").attr('class','btn btn-primary btn-click');
                                $("#qty").attr('max', qty);
                                $("#add-price").attr('price',val);
                                document.getElementById("add-price").innerHTML = val;
                                function getPrice(data){
                                    this.active = $(data);
                                    var val = $(data).attr("value");
                                    var qty = $(data).attr("stock");
                                    $(".btn-click").attr('class','btn btn-default btn-click');
                                    $(data).attr('class','btn btn-primary btn-click');
                                    $("#qty").attr('max', qty);
                                    $("#add-price").attr('price',val);
                                    document.getElementById("add-price").innerHTML = val;
                                }

                                function addToCart(){
                                    $data = {
                                        id:'{{$product->id}}',
                                        name:'{{$product->name}}',
                                        price:$("#add-price").attr('price'),
                                        qty:$("#qty").val(),
                                        size_id: active.attr("size"),
                                        image:'{{$product->image}}',
                                        duration_in_days:$("#duration").val()
                                    };
                                    console.log($data)
                                    $.post("{{route('user.cart-store')}}", $data,
                                        function(data, status){
                                            console.log(data)
                                            $("#cart").modal('show');
                                            getCart()
                                        });
                                }

                            </script>
                            <p class="text-center buttons">
                                <a href="#" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                {{--<a href="basket.html" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>--}}
                            </p>


                        </div>

                        <div class="row" id="thumbs">
                            @foreach($product->productImages as $val)
                                <div class="col-xs-4">
                                    <a href="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" class="thumb">
                                        <img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>


                <div class="box" id="details">
                    <p>
                    <h4>Seller Information</h4>
                    <p><i>Name </i>: {{$product->shop->name}}
                        <br><i>Description </i>: {{$product->shop->description}}
                        <br><i>Phone </i>: {{$product->shop->user->phone_number}}
                        <br><i>Location </i>: {{$product->shop->district}}, {{$product->shop->city}} {{$product->shop->country}}
                        <br><a href="#">more details..</a>
                    </p>
                    <h4>Product details</h4>
                    <p>{{$product->description}}</p>
                    <ul>
                        <li>Polyester</li>
                        <li>Machine wash</li>
                    </ul>
                    <h4>Size Available</h4>
                    <ul>
                        <li>@foreach($product->productSizes as $val){{$val->size->name}}, @endforeach</li>
                    </ul>

                    <blockquote>
                        <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                        </p>
                    </blockquote>

                    <hr>
                    <div class="social">
                        <h4>Show it to your friends</h4>
                        <p>
                            <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                        </p>
                    </div>
                </div>

                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height">
                            <h3>You may also like these products</h3>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="img/product2.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="detail.html">
                                            <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="detail.html" class="invisible">
                                <img src="img/product2.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="img/product1.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="detail.html">
                                            <img src="img/product1_2.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="detail.html" class="invisible">
                                <img src="img/product1.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="img/product3.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="detail.html">
                                            <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="detail.html" class="invisible">
                                <img src="img/product3.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>

                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                </div>


            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

@endsection