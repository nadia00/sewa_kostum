<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pesanan</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
                <button><a href=" {{ url('/logout') }} ">Logout</a></button>
            <h2>Pesanan Offline</h2>
            @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
            <form method="POST" action="{{ route('pesanan.submit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <span class="label label-success">{{ Session::get('message') }} </span>
                <input type="hidden" class="form-control" placeholder="Enter username" name="id_jasa" value="{{session('id')}}">                
                <div class="form-group">
                    <label>Nama Penyewa:</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="nama">
                </div>
                <div class="form-group">
                    <label>Kostum yang disewa:</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="id_kategori">
                </div>
                <div class="form-group">
                    <label>Jumlah sewa:</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="keterangan">
                </div>
                <div class="form-group">
                    <label>Tanggal pakai:</label>
                    <input type="date" class="form-control" placeholder="Enter username" name="harga">
                </div>
                <div class="form-group">
                    <label>Tanggal harus kembali:</label>
                    <input type="date" class="form-control" placeholder="Enter username" name="jumlah">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </body>
</html>
