@extends('layouts.master')
<?php
//        dd($review);
?>
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
                            <img src="{{url('/').Storage::disk('local')->url("app/".$product['image'])}}" alt="" class="img-responsive">
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
                                <?php $i=0 ?>
                                @for($i; $i<$review_result; $i++)
                                    <span class="fa fa-star checked"></span>
                                @endfor
                                <?php $i=0 ?>
                                @for($i; $i<$rest; $i++)
                                    <span class="fa fa-star"></span>
                                @endfor
                            </div>
{{--                            <p class="goToDescription">{{$review_f}}</p>--}}
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

                                <div class="center">
                                    <div class="col-lg-12">
                                        <div class="col-lg-4" >
                                            <label class="form-group">Jumlah :</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="row col-lg-12">
                                                <input type="button" id="down" value="-" data-min="1" class="btn btn-default"/>
                                                <input type="text" id="qty" value="1" style="width: 10%; text-align: center; border: 0px; background-color: #ffffff" disabled/>
                                                <input type="button" id="up" value="+" data-max="5" class="btn btn-default"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="submit" class="text-center">
                                    <a href="#" onclick="addToCart()" class="form-group btn btn-primary">
                                        <i class="fa fa-shopping-cart"></i> Add to cart
                                    </a>
                                </div>

                            @endif

                            <script>
                                var active = $("#size{{$temp_price}}");
                                var val = $("#size{{$temp_price}}").attr("value");
                                var qty = $("#size{{$temp_price}}").attr("stock");
                                $(".btn-click").attr('class','btn btn-default btn-click');
                                $("#size{{$temp_price}}").attr('class','btn btn-primary btn-click');
                                $("#up").attr('data-max', qty);
                                $("#add-price").attr('price',val);
                                document.getElementById("add-price").innerHTML = val;
                                document.getElementById("add-stock").innerHTML = qty;
                                function getPrice(data){
                                    this.active = $(data);
                                    var val = $(data).attr("value");
                                    var qty = $(data).attr("stock");
                                    $(".btn-click").attr('class','btn btn-default btn-click');
                                    $(data).attr('class','btn btn-primary btn-click');
                                    $("#up").attr('data-max', qty);
                                    $("#add-price").attr('price',val);
                                    document.getElementById("add-price").innerHTML = val;
                                }

                                $(document).ready(function() {
                                    $("#up").on('click',function(){
                                        var $incdec = $(this).parent().find("#qty");
                                        if ($incdec.val() < $(this).data("max")) {
                                            $incdec.val(parseInt($incdec.val())+1);
                                        }
                                    });

                                    $("#down").on('click',function(){
                                        var $incdec = $(this).parent().find("#qty");
                                        if ($incdec.val() > $(this).data("min")) {
                                            $incdec.val(parseInt($incdec.val())-1);
                                        }
                                    });
                                });

                                function addToCart(){
                                    var dataarray = [];
                                    $data = {
                                        id: '{{$product->id}}',
                                        id_shop:'{{$product->shop_id}}',
                                        name:'{{$product->name}}',
                                        price:$("#add-price").attr('price'),
                                        qty:$("#qty").val(),
                                        size_id: active.attr("size"),
                                        image:'{{$product->image}}',
                                    };
                                    var gambar = 'Gambarnya adalah: '+'<?php echo $product['image'] ?>';
                                    console.log($data);
                                    // console.log($data);
                                    $.post("{{route('user.cart-store')}}", $data,
                                        function(data, status){
                                            // console.log(data)
                                            $("#cart").modal('show');
                                            getCart()
                                        });
                                }
                            </script>
                        </div>
                    </div>
                </div>

                <div class="box" id="details">
                    <h4>Add Review</h4>
                    <div id="sudahreview">
                        Anda sudah memberikan review. Terima kasih Review yang diberikan.
                    </div>
                    <div id="review">
                        <form role="form" action="{{ route('review.store') }}" method="post">
                            @csrf
                            <input value="{{ $product['id'] }}" hidden="hidden" name="product_id">
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
                            @if($status_order == 1)
                                <button type="submit" class="btn btn-primary">Submit Review</button>
                            @else
                                {{--<label>Anda harus Login terlebih dahulu.</label>--}}
                                <button type="submit" class="btn btn-primary" disabled>Submit Review</button>
                            @endif
                        </form>
                    </div><br>

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


            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->
    <script>
        var sudahreview = document.getElementById("sudahreview");
        var review = document.getElementById("review");
        var cek =  $review ;
        console.log("Cek = "+cek);
        if (cek == 1) {
            sudahreview.style.display = "block";
            review.style.display = "none";
        } else {
            sudahreview.style.display = "none";
            review.style.display = "block";
        }
    </script>

@endsection