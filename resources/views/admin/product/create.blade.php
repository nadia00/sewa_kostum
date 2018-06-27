@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Tambah Kostum</li>
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
                            <li  class="active">
                                <a href="{{route('admin-shop.add-product')}}"><i class="fa fa-plus"></i> Tambah Kostum</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.product')}}"><i class="fa fa-list"></i> Daftar Kostum</a>
                            </li>
                            <li>
                                <a href="{{route('admin-shop.profile')}}"><i class="fa fa-user"></i> Toko</a>
                            </li>
                        </ul>
                    </div>

                    {{--<hr>--}}

                    {{--<div class="panel-body">--}}

                        {{--<ul class="nav nav-pills nav-stacked">--}}
                            {{--<li>--}}
                                {{--<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
                                    {{--<i class="fa fa-sign-out"></i> Logout--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--@csrf--}}
                            {{--</form>--}}
                        {{--</ul>--}}
                    {{--</div>--}}

                </div>
                <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <div class="col-lg-9">
                <div class="box">
                    <h3>Add Product</h3>
                    <div class="row">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('admin-shop.add-product')}}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-7 form-group">
                                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" id="name-modal" placeholder="Product Name" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row" hidden>
                                    <div class="col-sm-7 form-group ">
                                        <input type="text" class="form-control{{ $errors->has('shop_id') ? ' is-invalid' : '' }}" name="shop_id" value="{{ $shops->id }}" id="shop_id-modal" placeholder="shop_id" required autofocus disabled>
                                        @if ($errors->has('shop_id'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('shop_id') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-7">
                                        <textarea type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" id="description-modal" placeholder="Description" required autofocus></textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-7">
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

                                        @if ($errors->has('category'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-7">
                                        <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image[]" value="{{ old('image') }}" id="image-modal" placeholder="image" required autofocus multiple>
                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    @foreach($sizes as $size)
                                        <div class="form-group col-sm-6">
                                            <input type="checkbox" id="checkbox-{{$size->id}}" name="size[]" value="{{$size->id}}" autocomplete="off" onchange="setData(this)" />
                                            <div class="btn-group">
                                                <label for="checkbox-{{$size->id}}" class="btn btn-default">
                                                    <span><i class="fa fa-check"></i></span>
                                                    <span> </span>
                                                </label>
                                                <label for="checkbox-{{$size->id}}" class="btn btn-default active">
                                                    {{$size->name}}
                                                </label>
                                            </div>
                                            <div id="group-{{$size->id}}" hidden="hidden">
                                                <div class="form-group">
                                                    <br><input type="number" class="form-control" name="price-{{$size->id}}" value="" id="price-modal" placeholder="Harga {{$size->name}}" required autofocus>
                                                    <br><input type="number" class="form-control" name="stock-{{$size->id}}" value="" id="stock-modal" placeholder="Stok {{$size->name}}" required autofocus>
                                                </div>
                                            </div>
                                            <script>
                                                function setData(data){
                                                    $check = $(data).attr('checked');
                                                    if ($check === undefined){
                                                        $(data).attr('checked','checked');
                                                        $('#group-'+$(data).val()).removeAttr('hidden')
                                                    }else{
                                                        $(data).removeAttr('checked');
                                                        $('#group-'+$(data).val()).attr('hidden','hidden')
                                                    }

                                                }
                                            </script>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-11">
                                        <input class="btn btn-success" type="submit" name="submit" value="Create">
                                        <a class="btn btn-danger" href="{{ route('admin-shop.product') }}">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style rel="stylesheet">
        .form-group input[type="checkbox"] {
            display: none !important;
        }

        .form-group input[type="checkbox"] + .btn-group > label span {
            width: 20px !important;
        }

        .form-group input[type="checkbox"] + .btn-group > label span:first-child {
            display: none !important;
        }
        .form-group input[type="checkbox"] + .btn-group > label span:last-child {
            display: inline-block !important;
        }

        .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
            display: inline-block !important;
        }
        .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
            display: none !important;
        }
    </style>



@endsection