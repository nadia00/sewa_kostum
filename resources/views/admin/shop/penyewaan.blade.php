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
                                    @if(!empty($data))
                                        @foreach($data as $order)
                                            <div class="span11" style="border: 1px lightgrey solid; ">
                                                <div class="span2" style="margin: 3%">
                                                    <img src="{{url('/').Storage::disk('local')->url("app/".$order->gambar_kostum)}}" alt="Kostum Disewa" style="max-width: 100%; max-height: 100%">
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
                                                                <td><b>Nama Penyewa</b></td>
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

                                                <div class="span9" style="margin-top: 5%">
                                                    <form action="{{ route('terima.order') }}" method="post">
                                                        <input type="hidden" name="id_sewa" value='{{$order->id_sewa}}'>
                                                        <button class="btn btn-secondary" type="form">Terima</button>
                                                    </form>
                                                    <form action="{{ route('tolak.order') }}" method="post">
                                                        <input type="hidden" name="id_sewa" value='{{$order->id_sewa}}'>
                                                        <button class="btn btn-secondary" type="form">Tolak</button>
                                                    </form>
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
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#diterima">Sewa Diterima</a>
                        </div>
                        <div id="diterima" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                    <h4>Pesanan Sewa Sudah Diterima</h4>
                                    @if(!empty($terima))
                                        @foreach($terima as $orderTerima)
                                            <div class="span11" style="border: 1px lightgrey solid; ">
                                                <div class="span2" style="margin: 3%">
                                                    <img src="{{url('/').Storage::disk('local')->url("app/".$orderTerima->gambar_kostum)}}" alt="Kostum Disewa" style="max-width: 100%; max-height: 100%">
                                                </div>
                                                <div class="span9">
                                                    <div class="span5">
                                                        <table>
                                                            <tr>
                                                                <td colspan="3"><h4>{{$orderTerima->nama_kostum}}</h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Jumlah Sewa</b></td>
                                                                <td> : </td>
                                                                <td>{{$orderTerima->jumlah_sewa}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Tanggal Pakai</b></td>
                                                                <td> : </td>
                                                                <td>{{$orderTerima->pemakaian}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="span5">
                                                        <table style="margin-top: 17%">
                                                            <tr>
                                                                <td><b>Nama Penyewa</b></td>
                                                                <td> : </td>
                                                                <td>{{$orderTerima->nama_penyewa}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Tanggal Sewa</b></td>
                                                                <td> : </td>
                                                                <td>{{$orderTerima->tanggal_sewa}}</td>
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
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#ditolak">Sewa Ditolak</a>
                        </div>
                        <div id="ditolak" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                    <h4>Pesanan Sewa Sudah Diterima</h4>
                                    @if(!empty($tolak))
                                        @foreach($tolak as $orderTolak)
                                            <div class="span11" style="border: 1px lightgrey solid; ">
                                                <div class="span2" style="margin: 3%">
                                                    <img src="{{url('/').Storage::disk('local')->url("app/".$orderTolak->gambar_kostum)}}" alt="Kostum Disewa" style="max-width: 100%; max-height: 100%">
                                                </div>
                                                <div class="span9">
                                                    <div class="span5">
                                                        <table>
                                                            <tr>
                                                                <td colspan="3"><h4>{{$orderTolak->nama_kostum}}</h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Jumlah Sewa</b></td>
                                                                <td> : </td>
                                                                <td>{{$orderTolak->jumlah_sewa}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Tanggal Pakai</b></td>
                                                                <td> : </td>
                                                                <td>{{$orderTolak->pemakaian}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="span5">
                                                        <table style="margin-top: 17%">
                                                            <tr>
                                                                <td><b>Nama Penyewa</b></td>
                                                                <td> : </td>
                                                                <td>{{$orderTolak->nama_penyewa}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Tanggal Sewa</b></td>
                                                                <td> : </td>
                                                                <td>{{$orderTolak->tanggal_sewa}}</td>
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