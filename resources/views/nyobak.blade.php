@extends('layouts.header-footer')

@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <h4 class="title"><span class="text"><strong>Pesanan</strong> Anda</span></h4>
                <a href="" class="btn btn-secondary">Pesanan Offline</a>
                <div class="clearfix"></div>

                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#waiting">Sewa Baru</a>
                        </div>
                        <div id="waiting" class="accordion-body in collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                    <h4>Pesanan Baru</h4>
                                    <div class="span11" style="border: 1px lightgrey solid; ">
                                        <div class="span2" style="margin: 3%">
                                            <img src="{{asset('storage/app/image/hNVsNtJ2xtjHjdvTS6Pd9aJtIqluSeGKK8HO77z1.jpeg')}}" alt="Foto Profil" style="max-width: 100%; max-height: 100%">
                                        </div>
                                        <div class="span4">
                                            <h6>Nama Kostum</h6>
                                            <p>Jumlah Sewa</p>
                                            <p>Tanggal Pakai</p>
                                        </div>
                                        <div class="span4">
                                            <h6></h6><h6></h6><br>
                                            <p>Pemilik Toko</p>
                                            <p>Tanggal Sewa</p>
                                        </div>
                                    </div>
                                    <div class="span11" style="border: 1px lightgrey solid; ">
                                        <div class="span2" style="margin: 3%">
                                            <img src="{{asset('storage/app/image/hNVsNtJ2xtjHjdvTS6Pd9aJtIqluSeGKK8HO77z1.jpeg')}}" alt="Foto Profil" style="max-width: 100%; max-height: 100%">
                                        </div>
                                        <div class="span4">
                                            <h6>Nama Kostum</h6>
                                            <p>Jumlah Sewa</p>
                                            <p>Tanggal Pakai</p>
                                        </div>
                                        <div class="span4">
                                            <h6></h6><h6></h6><br>
                                            <p>Pemilik Toko</p>
                                            <p>Tanggal Sewa</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#diterima">Sewa Diterima</a>
                        </div>
                        <div id="diterima" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                    <h4>Pesanan Sewa Sudah Diterima</h4>
                                    <div class="span11">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#ditolak">Sewa Ditolak</a>
                        </div>
                        <div id="ditolak" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h4>Pesanan Sewa Sudah Ditolak</h4>
                                <div class="row-fluid">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#offline">Sewa Offline</a>
                        </div>
                        <div id="offline" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h4>Sewa Secara Offline</h4>
                                <div class="row-fluid">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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