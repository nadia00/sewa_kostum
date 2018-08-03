@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="well">Register Shop</h1>
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
                <form action="{{route('user.create-shop')}}" method="post"  enctype="multipart/form-data">
                    @csrf

                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-8 form-group">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" id="name-modal" placeholder="Shop Name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 form-group ">
                                <input type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ $users->email }}" id="user_id-modal" placeholder="user_id" required autofocus disabled>
                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-sm-4 form-group">
                                <input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" id="phone" placeholder="phone" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group{{ $errors->has('location_address') ? ' has-error' : '' }}">
                                <label for="location_address" style="margin-left: 12px" class="control-label">Address</label>
                                <a href="{{ route('location.maps') }}" style="color:white; padding: 5px" class="badge badge-secondary control-label">get Location</a>

                                <div class="col-md-12">
                                    @if(@$_GET['address'] == null)
                                        <?php $address = @$locations->location_address ?>
                                    @else
                                        <?php $address = $_GET['address'] ?>
                                    @endif

                                    <input id="location_address" type="text" class="form-control" name="location_address" value="{{ @$address }}"required>

                                    @if ($errors->has('location_address'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('location_address') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('location_lat') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    @if(@$_GET['lat'] == null)
                                        <?php $lat = @$locations->location_lat ?>
                                    @else
                                        <?php $lat = $_GET['lat'] ?>
                                    @endif

                                    <input id="location_lat" type="text" class="form-control" name="location_lat" placeholder="location_lat" value="{{ @$lat }}"required>

                                    @if ($errors->has('location_lat'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('location_lat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('location_lng') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    @if(@$_GET['lng'] == null)
                                        <?php $lng = @$locations->location_lng ?>
                                    @else
                                        <?php $lng = $_GET['lng'] ?>
                                    @endif

                                    <input id="location_lng" type="text" class="form-control" name="location_lng" placeholder="location_lang" value="{{ @$lng }}"required>

                                    @if ($errors->has('location_lng'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('location_lang') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>





                        <div class="row">
                            <div class="form-group col-sm-4">
                                <input type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" id="photo-modal" placeholder="photo" required autofocus>
                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-sm-8">
                                <textarea type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" id="description-modal" placeholder="description" required autofocus></textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">

                        </div>

                        <input class="btn btn-success" type="submit" name="submit" value="Create">

                        <a class="btn btn-danger" href="{{ route('home') }}">Cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection