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
            <h2>Kostum Anda</h2>
            <button><a href="{{ route('tambah.kostum') }}">Tambah Kostum</a></button>
            <br>
            @foreach($kostum as $kostum)
                <p>{{ $kostum->nama}}</p>
            <br>

            @endforeach
        </div>

    </body>
</html>




{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Kostum</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Kostum Anda</h2>
  <form action="/action_page.php">
    <div class="form-group">
      <label>Nama Jasa:</label>
      <input type="text" class="form-control" name="email" value="{{session('nama_jasa')}}" disabled>
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="email" class="form-control" name="email" value="{{session('email')}}" disabled>
    </div>
    <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" name="email" value="{{session('username')}}" disabled>
          </div>
    <div class="form-group">
        <label>No Telepon:</label>
        <input type="text" class="form-control" name="email" value="{{session('telp')}}" disabled>
    </div>
    <hr>
    <div class="form-group">
      <label>Nama Pemilik:</label>
      <input type="text" class="form-control" name="password" value="{{session('nama_pemilik')}}"disabled>
    </div>
    <button type="submit" class="btn btn-default">Edit Data</button>
  </form>
</div>

</body>
</html> --}}