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