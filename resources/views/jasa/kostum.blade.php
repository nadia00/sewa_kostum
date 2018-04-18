<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kostum Anda</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            /* Remove the navbar's default rounded borders and increase the bottom margin */ 
            .navbar {
              margin-bottom: 50px;
              border-radius: 0;
            }
            
            /* Remove the jumbotron's default bottom margin */ 
             .jumbotron {
              margin-bottom: 0;
            }
           
            /* Add a gray background color and some padding to the footer */
            footer {
              background-color: #f2f2f2;
              padding: 25px;
            }

            .img-responsive {
              width: auto !important;
              height: 200px !important;
            }
          </style>
    </head>
    <body>

        <div class="container">
            <button><a href=" {{ url('/logout') }} ">Logout</a></button>
            <h2>Kostum Anda</h2>
            <button><a href="{{ route('tambah.kostum') }}">Tambah Kostum</a></button>
            <br>
            <div class="row">
            @foreach($kostum as $val)
            <div class="col-sm-3 col-xs-6 ">
            <div class="panel panel-primary">
            <div class="panel-heading"></div>
                <div class="panel-body"><img src="{{url('/').Storage::disk('local')->url("app/".$val->gambar)}}" class="img-responsive center-block" alt="Image"></div>
                <a href=" {{ url('/detail') }} "><div class="panel-footer"> {{$val->nama_kostum}}</div></a>
                <div class="panel-footer">
                    <button>Edit</button>
                    <a href = 'delete/{{ $kostum->id }}'><button>Hapus</button></a>    
                </div>
            </div>
            </div>
            @endforeach
        </div>
    


            
        </div>

    </body>
</html>



