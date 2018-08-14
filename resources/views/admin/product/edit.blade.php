@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Edit Product</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Shop section</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="{{route('admin-shop.order')}}"><i class="fa fa-th-list"></i> Penyewaan</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.rekap')}}"><i class="fa fa-table"></i> Rekap Sewa</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.add-product')}}"><i class="fa fa-plus"></i> Tambah Kostum</a>
                            </li>
                            <li class="active">
                                <a href="{{route('admin-shop.product')}}"><i class="fa fa-list"></i> Daftar Kostum</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.profile')}}"><i class="fa fa-user"></i> Toko</a>
                            </li>
                        </ul>
                    </div>

                    <hr>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>

                </div>
                <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <div class="col-md-9">
                <div class="box">
                    <h1>My Product</h1>
                    <p class="lead">Change your product detail.</p>
                    <h3>Product details</h3>
                    {{--<div class="row" style="margin-bottom: 2%">--}}
                        @if(sizeof($product->productImages) != 0)
                            @foreach($product->productImages as $val)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="hovereffect">
                                        <img class="img-responsive" src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="">
                                        <div class="overlay">
                                            @if($val->image == $product->image)
                                                <a class="info">Home</a>
                                            @else
                                                <a class="info" href="{{route('admin-shop.del-image',['id'=>$val->id])}}">Delete</a>
                                                <a class="info" href="{{route('admin-shop.set-image',['id'=>$product->id, 'image_id'=>$val->id])}}">Set</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <h5>Tidak ada gambar.</h5>
                            </div>
                        @endif
                        <form action="{{route('admin-shop.post-edit-product')}}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="image">Add Image</label>
                                        <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image[]" value="{{ old('image') }}" id="image-modal" placeholder="image" autofocus multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="firstname">Name</label>
                                        <input type="text" class="form-control" id="name" value="{{ $product->name }}" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstname">Description</label>
                                        <textarea type="text" class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <?php
                                        $data = [];
                                        $size_data = [];
                                        foreach ($product->productCategories as $ctg){
                                            array_push($data, $ctg->category_id);
                                        }
                                        foreach ($sizes as $size){
                                            array_push($size_data, $size->id);
                                        }
                                        ?>
                                        {{--<select class="multipleSelect" multiple name="category[]">--}}
                                        {{--@if(isset($categories))--}}
                                        {{--@foreach($categories as $category)--}}
                                        {{--<option value="{{$category->id}}" @if(in_array($category->id, $data)) selected @endif>{{$category->name}}</option>--}}
                                        {{--@endforeach--}}
                                        {{--@else--}}
                                        {{--<option>Tidak Ada Kategori</option>--}}
                                        {{--@endif--}}
                                        {{--</select>--}}
                                        {{--<script>--}}
                                        {{--$('.multipleSelect').fastselect();--}}
                                        {{--</script>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center" style="margin-bottom: 4%;margin-top: -2%">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                            </div>
                        </form>
                        <!-- /.comment -->

                        <form action="{{route('admin-shop.edit-size')}}" method="post"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="col-sm-7">
                                        <tr>
                                            <td style="width: 100px; text-align: center;"><h4>Size</h4></td>
                                            <td colspan="2">
                                                <table class="table">
                                                    <input name="product_id" value="{{$product->id}}" type="hidden">
                                                    @if(sizeof($product->productSizes) != null)
                                                        @foreach($product->productSizes as $productSize)
                                                            <?php
                                                            $size_data = array_diff($size_data, [$productSize->size_id]);
                                                            ?>
                                                            <input type="hidden" name="update[{{$productSize->id}}][id]" value="{{$productSize->id}}">
                                                            <input type="hidden" name="update[{{$productSize->id}}][size_id]" value="{{$productSize->size_id}}">
                                                            <tr>
                                                                <td colspan="2"><b>{{$productSize->size->name}}</b> <a href="{{route('admin-shop.del-size',['id'=>$productSize->id])}}"><i class="fa fa-trash"></i></a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Harga</td>
                                                                <td>
                                                                    <input class="form-control" type="number" value="{{$productSize->price}}" name="update[{{$productSize->id}}][price]">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Stok</td>
                                                                <td>
                                                                    <input class="form-control" type="number" value="{{$productSize->quantity}}" name="update[{{$productSize->id}}][quantity]">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        @if(!empty($size_data))
                                                            <tr></tr>
                                                            <tr>
                                                                <td><button type="button" class="btn btn-primary" onclick="addSize()"><i class="fa fa-plus"></i> Add Size</button></td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="col-sm-8 text-center">
                                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="modal fade" id="size-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="Login">Tambah Ukuran</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin-shop.add-size')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <select class="form-control" name="size_id">
                                                    @foreach($sizes as $val)
                                                        @if(in_array($val->id,$size_data))<option value="{{$val->id}}">{{$val->name}}</option>@endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input class="hidden" name="product_id" value="{{$product->id}}">
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="price" placeholder="Price">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="number" name="quantity" placeholder="Quantity">
                                            </div>

                                            <p class="text-center">
                                                <button class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function addSize() {
                                $('#size-modal').modal("show");
                            }
                        </script>
                    {{--</div>--}}
                </div>
            </div>
            <!-- /.container -->
        </div>
        <style>
            .hovereffect {
                width: 100%;
                height: 100%;
                float: left;
                overflow: hidden;
                position: relative;
                text-align: center;
                cursor: default;
            }

            .hovereffect .overlay {
                width: 100%;
                height: 100%;
                position: absolute;
                overflow: hidden;
                top: 0;
                left: 0;
                opacity: 0;
                filter: alpha(opacity=0);
                background-color: rgba(0,0,0,0.5);
                -webkit-transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
                transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
            }

            .hovereffect img {
                display: block;
                position: relative;
                -webkit-transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
                transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
            }

            .hovereffect h2 {
                text-transform: uppercase;
                color: #fff;
                text-align: center;
                position: relative;
                font-size: 17px;
                background: rgba(0,0,0,0.6);
                -webkit-transform: translatey(-100px);
                -ms-transform: translatey(-100px);
                transform: translatey(-100px);
                -webkit-transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
                transition: all 0.4s cubic-bezier(0.88,-0.99, 0, 1.81);
                padding: 10px;
            }

            .hovereffect a.info {
                text-decoration: none;
                display: inline-block;
                text-transform: uppercase;
                color: #fff;
                border: 1px solid #fff;
                background-color: transparent;
                opacity: 0;
                filter: alpha(opacity=0);
                -webkit-transition: all 0.4s ease;
                transition: all 0.4s ease;
                margin: 50px 0 0;
                padding: 7px 14px;
            }

            .hovereffect a.info:hover {
                box-shadow: 0 0 5px #fff;
            }

            .hovereffect:hover img {
                -ms-transform: scale(1.2);
                -webkit-transform: scale(1.2);
                transform: scale(1.2);
            }

            .hovereffect:hover .overlay {
                opacity: 1;
                filter: alpha(opacity=100);
            }

            .hovereffect:hover h2,.hovereffect:hover a.info {
                opacity: 1;
                filter: alpha(opacity=100);
                -ms-transform: translatey(0);
                -webkit-transform: translatey(0);
                transform: translatey(0);
            }

            .hovereffect:hover a.info {
                -webkit-transition-delay: .2s;
                transition-delay: .2s;
            }


        </style>
        <!-- /#content -->

@endsection