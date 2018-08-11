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
                            <div class="col-sm-4 form-group">
                                <input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="Indonesia" id="country-modal" required autofocus disabled>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-sm-4 form-group">
                                <select name="province" class="form-control">
                                    <option value="Aceh">Aceh</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Banten">Banten</option>
                                    <option value="Bengkulu">Bengkulu</option>
                                    <option value="Gorontalo">Gorontalo</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Jambi">Jambi</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="Jawa Tengah">Jawa Tengah</option>
                                    <option value="Jawa Timur">Jawa Timur</option>
                                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                                </select>
                            </div>
                            <div class="col-sm-4 form-group">
                                <select name="city" class="form-control">
                                    <option value="Bangkalan">Kab. Bangkalan</option>
                                    <option value="Banyuwangi">Kab. Banyuwangi</option>
                                    <option value="Blitar">Kab. Blitar</option>
                                    <option value="Bojonegoro">Kab. Bojonegoro</option>
                                    <option value="Bondowoso">Kab. Bondowoso</option>
                                    <option value="Gresik">Kab. Gresik</option>
                                    <option value="Jember">Kab. Jember</option>
                                    <option value="Jombang">Kab. Jombang</option>
                                    <option value="Kediri">Kab. Kediri</option>
                                    <option value="Lamongan">Kab. Lamongan</option>
                                    <option value="Lumajang">Kab. Lumajang</option>
                                    <option value="Madiun">Kab. Madiun</option>
                                    <option value="Magetan">Kab. Magetan</option>
                                    <option value="Malang">Kab. Malang</option>
                                    <option value="Mojokerto">Kab. Mojokerto</option>
                                    <option value="Nganjuk">Kab. Nganjuk</option>
                                    <option value="Ngawi">Kab. Ngawi</option>
                                    <option value="Pacitan">Kab. Pacitan</option>
                                    <option value="Pamekasan">Kab. Pamekasan</option>
                                    <option value="Pasuruan">Kab. Pasuruan</option>
                                    <option value="Ponorogo">Kab. Ponorogo</option>
                                    <option value="Probolinggo">Kab. Probolinggo</option>
                                    <option value="Sampang">Kab. Sampang</option>
                                    <option value="Sidoarjo">Kab. Sidoarjo</option>
                                    <option value="Situbondo">Kab. Situbondo</option>
                                    <option value="Sumenep">Kab. Sumenep</option>
                                    <option value="Trenggalek">Kab. Trenggalek</option>
                                    <option value="Tuban">Kab. Tuban</option>
                                    <option value="Tulungagung">Kab. Tulungagung</option>
                                    <option value="Kota Batu">Kota Batu</option>
                                    <option value="Kota Kediri">Kota Kediri</option>
                                    <option value="Kota Madiun">Kota Madiun</option>
                                    <option value="Kota Malang">Kota Malang</option>
                                    <option value="Kota Mojokerto">Kota Mojokerto</option>
                                    <option value="Kota Pasuruan">Kota Pasuruan</option>
                                    <option value="Kota Probolinggo">Kota Probolinggo</option>
                                    <option value="Kota Surabaya">Kota Surabaya</option>
                                </select>
                                {{--<input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" id="city-modal" placeholder="city" required autofocus>--}}
                                {{--@if ($errors->has('city'))--}}
                                    {{--<span class="invalid-feedback">--}}
                                    {{--<strong>{{ $errors->first('city') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <textarea type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('district') }}" id="street-modal" placeholder="Street" required autofocus></textarea>
                                @if ($errors->has('street'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('street') }}</strong>
                                </span>
                                @endif
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