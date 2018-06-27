@extends('layouts.master')

@section('content')
    <div id="content">
        <div class="container">

            <div class="row">
                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
    _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="#">{{$category->name}} </a>
                                    </li>
                                @endforeach
                            </ul>
                            <script>
                                function selectCategori(data){
                                    var id = data.getAttribute('id');
                                    console.log(id)
                                }
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row" id="productMain">
                        <div class="col-sm-8">
                            <div class="container-fluid" id="cart_content">

                            </div>
                            <script>
                                $.get("{{url('user/order/show')}}", function (data) {
                                    document.getElementById("cart_content").innerHTML = data;
                                })

                            </script>
                        </div>
                        <div class="col-sm-4">
                            <div class="container-fluid">
                                <div class="box text-center">
                                    <p><i class="fa fa-credit-card"></i> Alamat Pengiriman</p>
                                    <form action="{{route("user.order")}}" method="post" id="form_order">@csrf</form>
                                    @if(sizeof($address) > 0)
                                        <div class="form-group">
                                            <select class="form-control" form="form_order" name="addresses_id">
                                                @foreach($address as $val)
                                                    <option value="{{$val->id}}">{{$val->country}}, {{$val->steet}} {{$val->district}} {{$val->zip_code}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class='panel panel-danger text-center'>
                                            <div class='panel-heading'>No Address</div>
                                        </div>
                                    @endif
                                    <button class="btn btn-primary" style="cursor: pointer" onclick="addAddress()">
                                        <i class="fa fa-plus"></i> Tambah Alamat
                                    </button>
                                    <script>
                                        function addAddress(){
                                            $("#add_address").modal('show');
                                        }
                                    </script>
                                </div>
                                <div class="box text-center">
                                    <button form="form_order" class="btn btn-primary" style="cursor: pointer">
                                        <i class="fa fa-plus"></i> Order
                                    </button>
                                    <script>
                                        function addAddress(){
                                            $("#add_address").modal('show');
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection