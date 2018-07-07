@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    <li>Kostum {{$product->name}}</li>
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
                                <a href="#">All Categories </a>
                            </li>
                            <li>
                                <a href="#" id="2" onclick="selectCategori(this)">Adat  </a>
                            </li>
                            <li>
                                <a href="#" id="3" onclick="selectCategori(this)">Tari  </a>
                            </li>
                            <li>
                                <a href="#" id="4" onclick="selectCategori(this)">Juang  </a>
                            </li>
                            <li>
                                <a href="#" id="5" onclick="selectCategori(this)">Absensi  </a>
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
                        <div class="row" id="thumbs" style="margin-top: 3%">
                            @foreach($product->productImages as $val)
                                <div class="col-xs-4">
                                    <a href="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" class="thumb">
                                        <img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center">{{$product->name}}</h1>
                            <div class="text-center">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                            </p>
                            @if(empty(sizeof($product->productSizes)))
                                <p>Tidak tersedia</p>
                            @else
                            <div class="text-center">
                                <p>Ukuran tersedia:</p>
                                <?php $i=true?>
                                    @foreach($product->productSizes as $val)
                                        <button style="width: 30%; margin-left: 1%" class="btn btn-default btn-click" size="{{$val->id}}" id="size{{$val->id}}" stock="{{$val->stock($val->id)}}" value="{{$val->price}}" onclick="getPrice(this)">{{$val->size->name}}</button>
                                        @if($i === true)
                                            <?php $temp_price = $val->id;$i=false;?>
                                        @endif
                                    @endforeach
                            </div>
                            <p class="price">Rp <span id="add-price"></span></p>
                            <p class="text-center"><b>Stok :</b> <span id="add-stock"></span></p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label>Jumlah :</label>
                                            <div class="form-group">
                                                <input class="form-control" placeholder="jumlah" id="qty" type="number" min="1" value="0" >
                                            </div>
                                        </div>
                                    </div>
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
                                document.getElementById("add-stock").innerHTML = qty;
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

                                $(document).ready(function () {
                                    $("[type='number']").keypress(function (evt) {
                                        evt.preventDefault();
                                    });
                                });
                                function addToCart(){
                                    $data = {
                                        id:'{{$product->id}}',
                                        id_shop:'{{$product->shop_id}}',
                                        name:'{{$product->name}}',
                                        price:$("#add-price").attr('price'),
                                        qty:$("#qty").val(),
                                        size_id: active.attr("size"),
                                        image:'{{$product->image}}',
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
                            <div  id="submit" class="text-center"><a href="#" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a></div>
                            @endif
                        </div>


                    </div>

                </div>


                <div class="box" id="details">

                    <h4>Add Review</h4>
                    <form>
                        <div>
                            <span class="star-cb-group">
                              <input type="radio" id="rating-5" name="rating" value="5" />
                              <label for="rating-5">5</label>
                              <input type="radio" id="rating-4" name="rating" value="4" checked="checked" />
                              <label for="rating-4">4</label>
                              <input type="radio" id="rating-3" name="rating" value="3" />
                              <label for="rating-3">3</label>
                              <input type="radio" id="rating-2" name="rating" value="2" />
                              <label for="rating-2">2</label>
                              <input type="radio" id="rating-1" name="rating" value="1" />
                              <label for="rating-1">1</label>
                              <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear" />
                              <label for="rating-0">0</label>
                            </span>
                        </div>
                    </form>


                    <h4>Product details</h4>
                    <p>{{$product->description}}</p>

                    <h4>Size Available</h4>
                    @if(empty(sizeof($product->productSizes)))
                        <p>Tidak ada data</p>
                    @else
                        <ul>
                            <li>@foreach($product->productSizes as $val){{$val->size->name}}, @endforeach</li>
                        </ul>
                    @endif

                    <h4>Seller Information</h4>
                    <p><i>Name </i>: {{$product->shop->name}}
                        <br><i>Phone </i>: {{$product->shop->user->phone_number}}
                        <br><i>Location </i>: {{$product->shop->district}}, {{$product->shop->city}} {{$product->shop->country}}
                    </p>

                    @if($product->shop->description != null)
                        <blockquote>
                            <p><em>{{$product->shop->description}}</em></p>
                        </blockquote>
                    @endif


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