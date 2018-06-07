@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    @foreach($data['kategori'] as $item)
                        <li><a href="#">{{$item['nama_kategori']}}</a>
                    @endforeach
                    </li>
                    <li>{{$data['nama_kostum']}}</li>
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
                            <img src="{{url('/').Storage::disk('local')->url("app/".$data['gambar'][0]['filepath'])}}" alt="" class="img-responsive">
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center">{{$data['nama_kostum']}}</h1>
                            <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                            </p>

                            <p>Ukuran :</p>
                            <select id="ukuran" onchange="selectUkuran()">
                                @foreach($ukuran as $val)
                                    <option value="{{$val->id}}">{{$val->nama}}</option>
                                @endforeach
                            </select>
                                <p class="price">Rp <span id="hargaKostum"></span></p>
                            <script>
                                function selectUkuran(){
                                    var val = $('#ukuran').val();
                                    $.get('{{asset('')}}user/detail-data/'+val+'/{{$data['id_kostum']}}', function (data, status) {
                                        console.log(data);
                                        document.getElementById("hargaKostum").innerHTML = data.harga;
                                    });
                                }
                            </script>
                            <p class="text-center buttons">
                                <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                <a href="basket.html" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                            </p>


                        </div>

                        <div class="row" id="thumbs">
                            @foreach($data['gambar'] as $gam)
                                <div class="col-xs-4">
                                    <a href="{{url('/').Storage::disk('local')->url("app/".$gam['filepath'])}}" class="thumb">
                                        <img src="{{url('/').Storage::disk('local')->url("app/".$gam['filepath'])}}" alt="" class="img-responsive">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>


                <div class="box" id="details">
                    <p>
                    <h4>Product details</h4>
                    <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
                    <h4>Material & care</h4>
                    <ul>
                        <li>Polyester</li>
                        <li>Machine wash</li>
                    </ul>
                    <h4>Size & Fit</h4>
                    <ul>
                        <li>Regular fit</li>
                        <li>The model (height 5'8" and chest 33") is wearing a size S</li>
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