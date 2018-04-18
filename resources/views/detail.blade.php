@extends('layouts.master')
@section('style')
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
  </style>
@endsection
</head>
<body>

@section('content')
<div class="container">
  <div class="row">
@foreach($result as $kostum)
    <div class="col-sm-3 col-xs-6 ">
        <div class="panel-footer">Rp {{$kostum->nama}}</div>
        <img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar)}}" class="center block">
        <div class="panel-footer">Rp {{$kostum->harga}}</div>

    </div>
    
@endforeach
  </div>
</div>

<style>
    .img-responsive {
        width: auto !important;
        height: 200px !important;
    }
</style>
@endsection

</body>
</html>
