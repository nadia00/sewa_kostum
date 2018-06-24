@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="well">Register Shops</h1>
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
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-7 form-group">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" id="name-modal" placeholder="shop name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7 form-group ">
                                <input type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" value="{{ $users->email }}" id="user_id-modal" placeholder="user_id" required autofocus disabled>
                                @if ($errors->has('user_id'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <select class="form-control{{ $errors->has('type_id') ? ' is-invalid' : '' }}" name="type_id" id="type_id-modal" required autofocus>
                                    @foreach($types as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type_id'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('type_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-sm-6 form-group">
                                <input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" id="country-modal" placeholder="country" required autofocus>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-sm-6 form-group">
                                <input type="text" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" name="district" value="{{ old('district') }}" id="district-modal" placeholder="district" required autofocus>
                                @if ($errors->has('district'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('district') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-sm-6 form-group">
                                <input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" id="city-modal" placeholder="city" required autofocus>
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-11">
                                <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" id="description-modal" placeholder="description" required autofocus>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-11">
                                <input type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" id="photo-modal" placeholder="photo" required autofocus>
                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" name="submit" value="Create">

                            <a class="btn btn-danger" href="{{ route('home') }}">Cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection