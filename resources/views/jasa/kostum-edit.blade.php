<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Upload Kostum Anda</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Edit Kostum</h2>
            <form method="POST" action="{{ route('edit.kostum.submit') }}" >
                {{ csrf_field() }}

                <span class="label label-success">{{ Session::get('message') }} </span>
                
                <div class="form-group">
                    <label for="username">Nama Kostum:</label>
                    <input type="text" class="form-control" id="nama" placeholder="Enter username" name="nama">
                </div>
                <div class="form-group">
                    <label for="username">Keterangan:</label>
                    <input type="text" class="form-control" id="keterangan" placeholder="Enter username" name="keterangan">
                </div>
                <div class="form-group">
                    <label for="username">Harga:</label>
                    <input type="text" class="form-control" id="harga" placeholder="Enter username" name="harga">
                </div>
                <div class="form-group">
                    <label for="username">Jumlah Keseluruhan Kostum:</label>
                    <input type="text" class="form-control" id="jumlah" placeholder="Enter username" name="jumlah">
                </div>
                <div class="form-group">
                    <label for="username">Stok Ready:</label>
                    <input type="text" class="form-control" id="stok" placeholder="Enter username" name="stok">
                </div>
                <h3>Tambah Gambar</h3>
                <div class="form-group">
                    <label for="username">Gambar:</label>
                    <input type="file" class="form-control" id="stok" placeholder="Pilih Gambar" name="gambar">
                </div>
                <div class="form-group">
                    <label for="username">View:</label>
                    <input type="text" class="form-control" id="stok" placeholder="Enter view" name="view">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </body>
</html>
