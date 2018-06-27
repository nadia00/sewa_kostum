@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="container">
            <h1 class="well">Edit Product</h1>
            <div class="col-lg-12 well">
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
                    <form action="{{route('admin-shop.edit-product')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}" id="name-modal" placeholder="product name" required autofocus>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-7 form-group">
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $product->name }}" id="name-modal" placeholder="product name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row" hidden>
                                <div class="col-sm-7 form-group ">
                                    <input type="text" class="form-control{{ $errors->has('shop_id') ? ' is-invalid' : '' }}" name="shop_id" value="{{ $product->shop->id }}" id="shop_id-modal" placeholder="shop_id" required autofocus disabled>
                                    @if ($errors->has('shop_id'))
                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('shop_id') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-11">
                                    <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $product->description }}" id="description-modal" placeholder="description" required autofocus>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-11">
                                    <select class="multipleSelect" multiple name="category[]" >
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
                                <div class="form-group col-sm-11">
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
                                            <input type="number" class="form-control" name="price-{{$size->id}}" value="" id="price-modal" placeholder="Harga {{$size->name}}" required autofocus>
                                            <input type="number" class="form-control" name="stock-{{$size->id}}" value="" id="stock-modal" placeholder="Stok {{$size->name}}" required autofocus>
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