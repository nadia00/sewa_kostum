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
                    <div id="myCarousel" class="myCarousel carousel slide">
                        <div class="carousel-inner">
                            @if(!empty($data))
                            <?php $j=0;$i=0 ?>
                            @foreach($data as $kostum)
                                    @if($j==4)
                                        <?php $j=0; ?>
                                    @endif
                                    @if($j==0)
                                        @if($i==0)
                                        <div class="active item">
                                        @else
                                        <div class="item">                                        
                                        @endif
                                        <ul class="thumbnails">
                                    @endif
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>
                                                <p><a href="{{ url('user/detail', [$kostum->id_kostum]) }}"><img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar_kostum)}}" alt="{{$kostum->nama_kostum}}"></a></p>
                                                <a href="{{ url('user/detail', [$kostum->id_kostum]) }}" class="title">{{$kostum->nama_kostum}}</a><br/>
                                                <a href="{{ url('user/detail', [$kostum->id_kostum]) }}" class="category">{{$kostum->kategori}}</a>
                                                <p class="price">Rp. {{$kostum->harga}},-</p>
                                            </div>
                                        </li>
                                    @if($j==0)
                                            </ul>
                                        </div>    
                                    @endif  
                                    <?php $j=0;$i=0 ?>
                                @endforeach
                            @else
                                <div class="panel panel-default">
                                    <div class="panel-body center bg-danger">Tidak Ada Data</div>
                                </div>
                            @endif
                                </ul>
                            </div>
                            {{-- <div class="item">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/ladies/5.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Know exactly</a><br/>
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$22.30</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/ladies/6.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
                                            <a href="products.html" class="category">Commodo consequat</a>
                                            <p class="price">$40.25</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/ladies/7.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">You think water</a><br/>
                                            <a href="products.html" class="category">World once</a>
                                            <p class="price">$10.45</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/ladies/8.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Quis nostrud exerci</a><br/>
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$35.50</p>
                                        </div>
                                    </li>																																	
                                </ul>
                            </div> --}}
                        </div>							
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
                    <div id="myCarousel-2" class="myCarousel carousel slide">
                        <div class="carousel-inner">
                            <div class="active item">
                                <ul class="thumbnails">												
                                    <li class="span3">
                                        <div class="product-box">
                                            <span class="sale_tag"></span>
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware2.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
                                            <a href="products.html" class="category">Commodo consequat</a>
                                            <p class="price">$25.50</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware1.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Quis nostrud exerci tation</a><br/>
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$17.55</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware6.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Know exactly turned</a><br/>
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$25.30</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware5.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">You think fast</a><br/>
                                            <a href="products.html" class="category">World once</a>
                                            <p class="price">$25.60</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="item">
                                <ul class="thumbnails">
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware4.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Know exactly</a><br/>
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$45.50</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware3.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
                                            <a href="products.html" class="category">Commodo consequat</a>
                                            <p class="price">$33.50</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware2.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">You think water</a><br/>
                                            <a href="products.html" class="category">World once</a>
                                            <p class="price">$45.30</p>
                                        </div>
                                    </li>
                                    <li class="span3">
                                        <div class="product-box">
                                            <p><a href="product_detail.html"><img src="themes/images/cloth/bootstrap-women-ware1.jpg" alt="" /></a></p>
                                            <a href="product_detail.html" class="title">Quis nostrud exerci</a><br/>
                                            <a href="products.html" class="category">Quis nostrud</a>
                                            <p class="price">$25.20</p>
                                        </div>
                                    </li>																																	
                                </ul>
                            </div>
                        </div>							
                    </div>
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