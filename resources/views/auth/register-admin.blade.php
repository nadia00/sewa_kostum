<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Register Admin</h2>
            <form method="POST" action="{{ route('register.admin.submit') }}" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                </div>
                <div class="form-group">
                    <label for="telp">Telepon:</label>
                    <input type="text" class="form-control" id="telp" placeholder="Enter telepon" name="telp">
                </div>
                <div class="form-group">
                    <label for="telp">Nama Jasa:</label>
                    <input type="text" class="form-control" id="telp" placeholder="Enter jasa" name="nama_jasa">
                </div>
                <div class="form-group">
                    <label for="telp">Nama Pemilik:</label>
                    <input type="text" class="form-control" id="telp" placeholder="Enter pemilik" name="nama_pemilik">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
                <button type="submit" class="btn btn-default">Register</button>
            </form>
        </div>

    </body>
</html>
