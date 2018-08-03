@extends('layouts.master')
@section('content')
    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>All Categories</li>
                </ul>
            </div>

            <div class="col-md-3">
                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->

                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Lokasi</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked category-menu">
                            <form method="post" action="{{ route('filter') }}">
                                <li>
                                    <input type="checkbox" name="kota[]" value="Bojonegoro"> Bangkalan
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Bojonegoro"> Banyuwangi
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Bojonegoro"> Blitar
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Bojonegoro"> Bojonegoro
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Bondowoso"> Bondowoso
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Lamongan"> Lamongan
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
                                    <input type="checkbox" name="kota[]" value="Malang"> Magetan
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Malang"> Malang
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Mojokerto"> Mojokerto
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Ngawi"> Ngawi
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Pasuruan"> Pasuruan
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Probolinggo"> Probolinggo
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="SBY"> Surabaya
                                </li>
                                <li>
                                    <input type="checkbox" name="kota[]" value="Sidoarjo"> Sidoarjo
                                </li>

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

            @if(sizeof($products) != 0)
                <div class="col-md-9">
                    @foreach($products as $val)
                        <div class="col-md-4 col-sm-6 product-container" id="product-container">
                            <div class="product" id="product">
                                <div class="flip-container" style="height: 250px;">
                                    <div class="flipper">
                                        <div class="front" style="height: 250px;padding: 10px;">
                                            <a href="{{ route('product-detail', ['id'=>$val->id]) }}">
                                                <img style="height: 100%; margin: 0 auto;" src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back" style="height: 250px;padding: 10px;">
                                            <a href="{{ route('product-detail', ['id'=>$val->id]) }}">
                                                <img style="height: 100%; margin: 0 auto;" src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="{{$val->name}}" class="img-responsive">
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
                    @endforeach
                </div>
            @else
                <div class="col-md-9">
                    <div class="panel col-lg-12">
                        <div class="panel-body">Tidak Ada Kostum</div>
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection

<script>
        var array  = <?php echo json_encode(@$kota); ?>;
        array.forEach(function (element) {
            var list = document.querySelectorAll( 'input[type=checkbox]' );
            console.log(list);

        });
</script>