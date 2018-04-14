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
      <div class="panel panel-primary">
      <div class="panel-heading"></div>
        <div class="panel-body"><img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar)}}" class="img-responsive center-block" alt="Image"></div>
        <div class="panel-footer">Owner : {{$kostum->nama_jasa}}</div>
        <div class="panel-footer">Harga : {{$kostum->harga}}</div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-6 ">
        <div class="panel panel-primary">
            <div class="panel-heading"></div>
            <div class="panel-body"><img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar)}}" class="img-responsive center-block" alt="Image"></div>
            <div class="panel-footer">Owner : {{$kostum->nama_jasa}}</div>
        <div class="panel-footer">Harga : {{$kostum->harga}}</div>
    </div>
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
{{-- <div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
  </div>
</div><br><br> --}}
@endsection

</body>
</html>
