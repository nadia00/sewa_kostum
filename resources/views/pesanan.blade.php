@extends('layouts.header-footer')

@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#waiting">Pesanan Belum Dikonfirmasi</a>
                        </div>
                        <div id="waiting" class="accordion-body in collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                    <h4>Menunggu Konfirmasi</h4>
                                    @if(!empty($data))
                                        @foreach($data as $order)
                                            <div class="span11" style="border: 1px lightgrey solid; ">
                                                <div class="span2" style="margin: 3%">
                                                    <img src="{{asset('storage/app/image/hNVsNtJ2xtjHjdvTS6Pd9aJtIqluSeGKK8HO77z1.jpeg')}}" alt="Foto Profil" style="max-width: 100%; max-height: 100%">
                                                </div>
                                                <div class="span9">
                                                    <div class="span5">
                                                        <table>
                                                            <tr>
                                                                <td colspan="3"><h4>{{$order->nama_kostum}}</h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Jumlah Sewa</b></td>
                                                                <td> : </td>
                                                                <td>{{$order->jumlah_sewa}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Tanggal Pakai</b></td>
                                                                <td> : </td>
                                                                <td>{{$order->pemakaian}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="span5">
                                                        <table style="margin-top: 17%">
                                                            <tr>
                                                                <td><b>Pemilik Toko</b></td>
                                                                <td> : </td>
                                                                <td>{{$order->nama_penyewa}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Tanggal Sewa</b></td>
                                                                <td> : </td>
                                                                <td>{{$order->tanggal_sewa}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="panel panel-default">
                                            <div class="panel-body center bg-danger">Belum ada pesanan baru</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#diterima">Pesanan Diterima</a>
                        </div>
                        <div id="diterima" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                    <h4>Pesanan Sudah Diterima</h4>
                                    @if(!empty($dataterima))
                                        @foreach($dataterima as $order)
                                            <div class="span11" style="border: 1px lightgrey solid; ">
                                                <div class="span2" style="margin: 3%">
                                                    <img src="{{asset('storage/app/image/hNVsNtJ2xtjHjdvTS6Pd9aJtIqluSeGKK8HO77z1.jpeg')}}" alt="Foto Profil" style="max-width: 100%; max-height: 100%">
                                                </div>
                                                <div class="span9">
                                                    <div class="span5">
                                                        <table>
                                                            <tr>
                                                                <td colspan="3"><h4>{{$order->nama_kostum}}</h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Jumlah Sewa</b></td>
                                                                <td> : </td>
                                                                <td>{{$order->jumlah_sewa}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Tanggal Pakai</b></td>
                                                                <td> : </td>
                                                                <td>{{$order->pemakaian}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="span5">
                                                        <table style="margin-top: 17%">
                                                            <tr>
                                                                <td><b>Pemilik Toko</b></td>
                                                                <td> : </td>
                                                                <td>{{$order->nama_penyewa}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Tanggal Sewa</b></td>
                                                                <td> : </td>
                                                                <td>{{$order->tanggal_sewa}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="panel panel-default">
                                            <div class="panel-body center bg-danger">Belum ada pesanan baru</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#ditolak">Pesanan Ditolak</a>
                        </div>
                        <div id="ditolak" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h4>Pesanan Sudah Ditolak</h4>
                                @if(!empty($datatolak))
                                    @foreach($datatolak as $order)
                                        <div class="span11" style="border: 1px lightgrey solid; ">
                                            <div class="span2" style="margin: 3%">
                                                <img src="{{asset('storage/app/image/hNVsNtJ2xtjHjdvTS6Pd9aJtIqluSeGKK8HO77z1.jpeg')}}" alt="Foto Profil" style="max-width: 100%; max-height: 100%">
                                            </div>
                                            <div class="span9">
                                                <div class="span5">
                                                    <table>
                                                        <tr>
                                                            <td colspan="3"><h4>{{$order->nama_kostum}}</h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Jumlah Sewa</b></td>
                                                            <td> : </td>
                                                            <td>{{$order->jumlah_sewa}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Tanggal Pakai</b></td>
                                                            <td> : </td>
                                                            <td>{{$order->pemakaian}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="span5">
                                                    <table style="margin-top: 17%">
                                                        <tr>
                                                            <td><b>Pemilik Toko</b></td>
                                                            <td> : </td>
                                                            <td>{{$order->nama_penyewa}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Tanggal Sewa</b></td>
                                                            <td> : </td>
                                                            <td>{{$order->tanggal_sewa}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="panel panel-default">
                                        <div class="panel-body center bg-danger">Belum ada pesanan baru</div>
                                    </div>
                                @endif
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