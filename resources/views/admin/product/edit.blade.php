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
                    @foreach($product->productImages as $val)
                        <div class="col-xs-4">
                            <a href="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" class="thumb">
                                <img src="{{url('/').Storage::disk('local')->url("app/".$val->image)}}" alt="" class="img-responsive">
                            </a>
                        </div>
                    @endforeach
                    <form action="" method="post"  enctype="multipart/form-data">
                        @csrf
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
                                    <select class="multipleSelect" multiple name="category[]">
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        @else
                                            <option>Tidak Ada Kategori</option>
                                        @endif
                                    </select>
                                    <script>
                                        $('.multipleSelect').fastselect();
                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="col-sm-12">
                                <table class="col-sm-8">
                                    <tr>
                                        <td style="width: 100px;">Ukuran</td>
                                        <td colspan="2">
                                            <table class="table">
                                            @foreach($product->productSizes as $val)
                                                <tr>
                                                    <tr>
                                                        <td colspan="2"><b>{{$val->size->name}}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga</td>
                                                        <td>
                                                            <input class="form-control" type="number" value="{{$val->price}}" name="price">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Stok</td>
                                                        <td>
                                                            <input class="form-control" type="number" value="{{$val->quantity}}" name="price">
                                                        </td>
                                                    </tr>
                                                </tr>
                                            @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.comment -->

                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

@endsection