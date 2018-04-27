@extends('layouts.master')
<style>
    .img-responsive {
        width: auto !important;
        height: 200px !important;
    }
</style>
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('shop.create') }}">
            @csrf
            <div class="form-group row">
                <label for="nama_toko" class="col-sm-4 col-form-label text-md-right">{{ __('Nama Toko') }}</label>
                <input type="text" class="form-control" name="nama_toko" id="nama_toko" placeholder="Masukan Nama Toko">
                @if ($errors->has('nama_toko'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nama_toko') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <label for="motto" class="col-sm-4 col-form-label text-md-right">{{ __('Motto') }}</label>
                <input type="text" class="form-control" name="motto" id="motto" placeholder="Masukan Motto">
                @if ($errors->has('motto'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('motto') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <label for="telepon" class="col-sm-4 col-form-label text-md-right">{{ __('Telepon') }}</label>
                <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Masukan Nomor Telepon">
                @if ($errors->has('telepon'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('telepon') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <label for="lokasi" class="col-sm-4 col-form-label text-md-right">{{ __('Lokasi') }}</label>
                <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukan Lokasi">
                @if ($errors->has('lokasi'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('lokasi') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
