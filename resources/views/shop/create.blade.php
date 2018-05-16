@extends('layouts.header-footer')

@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <h4 class="title"><span class="text"><strong>Buka</strong> Toko</span></h4>
                <div class="span2">
                    <img src="{{asset('storage/app/image/hNVsNtJ2xtjHjdvTS6Pd9aJtIqluSeGKK8HO77z1.jpeg')}}" alt="Foto Profil" style="max-width: 100%; max-height: 100%">
                    <a class="btn btn-block btn-secondary">Pilih Foto</a>
                </div>
                <div class="span6" style="padding-left: 3%">

                    <form method="POST" action="{{ route('shop.create') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_toko" class="col-sm-4 col-form-label text-md-right">{{ __('Nama Toko') }}</label>
                            <input type="text" class="input-xxlarge form-control" name="nama_toko" id="nama_toko" placeholder="Masukan Nama Toko">
                            @if ($errors->has('nama_toko'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('nama_toko') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="motto" class="col-sm-4 col-form-label text-md-right">{{ __('Motto') }}</label>
                            <input type="text" class="input-xxlarge form-control" name="motto" id="motto" placeholder="Masukan Motto">
                            @if ($errors->has('motto'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('motto') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="telepon" class="col-sm-4 col-form-label text-md-right">{{ __('Telepon') }}</label>
                            <input type="number" class="input-xxlarge form-control" name="telepon" id="telepon" placeholder="Masukan Nomor Telepon">
                            @if ($errors->has('telepon'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('telepon') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="lokasi" class="col-sm-4 col-form-label text-md-right">{{ __('Lokasi') }}</label>
                            <textarea type="text"  class="input-xxlarge form-control" name="lokasi" id="lokasi" placeholder="Masukan Lokasi"></textarea>
                            @if ($errors->has('lokasi'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('lokasi') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="clearfix"></div>
                {{--<hr>--}}
            </div>

            {{-- Side Bar --}}
            <div class="span3 col">
                <div class="block">
                    <ul class="nav nav-list">
                        <li class="nav-header">Toko-ku</li>
                        <li><a href="{{route('shop')}}">Profil</a></li>
                        <li><a href="{{route('order.get')}}">Daftar Transaksi</a></li>
                        <li>Kostum</li>
                        <li><a href="{{ route('kostum.add') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> Tambah Kostum</a></li>
                        <li><a href="{{ route('kostum.get') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;> Daftar Kostum</a></li>
                        <li><a href="products.html">Setting Toko</a></li>
                    </ul>
                    <br/>
                    <ul class="nav nav-list below">
                        <li class="nav-header">Akun-ku</li>
                        <li><a href="{{route('user')}}">Profil</a></li>
                        <li><a href="products.html">Request</a></li>
                        <li><a href="products.html">Daftar Sewa</a></li>
                        <li><a href="products.html">Review</a></li>
                        <li><a href="products.html">Setting</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection