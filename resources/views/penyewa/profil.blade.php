<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>    
  
<div class="container">
    <button><a href=" {{ url('/logout') }} ">Logout</a></button>
        
    <h2>Profil Penyewa</h2>
    <form>
      <div class="form-group">
        <label>Nama:</label>
        <input type="text" class="form-control" name="nama" value="{{session('nama')}}" disabled>
      </div>
      <div class="form-group">
        <label>No Telepon:</label>
        <input type="text" class="form-control" name="telp" value="{{session('telp')}}" disabled>
      </div>
      <hr>
      <div class="form-group">
        <label>Email:</label>
        <input type="text" class="form-control" name="email" value="{{session('email')}}" disabled>
      </div>
      <div class="form-group">
        <label>Username:</label>
        <input type="text" class="form-control" name="username" value="{{session('username')}}" disabled>
      </div>
      
      <div class="form-group">
      <button type="submit" class="btn btn-default">Edit Data</button>
    </form>
  </div>

</body>
</html>
