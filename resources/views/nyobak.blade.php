@extends('layouts.master')

@section('custom_css')
    <style>
        .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 8px 16px;
            font-size: 17px;
            width: 33%;
        }

        .tablink:hover {
            background-color: #a5acb7;
        }

        /* Style the tab content */
        .tabcontent {
            width: 99%;
            height: 210px;
            color: black;
            display: none;
            padding: 10px;
            text-align: center;
            border: 1px solid #38c1a3;
            -webkit-animation: fadeEffect 1s;
            animation: fadeEffect 1s;
        }

        /* Fade in tabs */
        @-webkit-keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        #1bulan {background-color:#38c1a3;}
        #3bulan {background-color:#38c1a3;}
        #6bulan {background-color:#38c1a3;}
    </style>
@endsection

@section('content')

    <div class="content">
        <div class="container">
            <div class="col-sm-12">
                <div class="col-sm-3">
                    @if($shop->image == null)
                        <img src="{{asset('public/page/img/shop.png')}}" class="img-responsive img-thumbnail img-rounded" style="width: 200px; height: 200px;">
                    @else
                        <img src="{{url('/').Storage::disk('local')->url("app/".$shop->image)}}" class="img-responsive img-thumbnail img-rounded" style="width: 200px; height: 200px;">
                    @endif
                </div>
                <div class="col-sm-6" style="padding-left: 0">
                    <h1>{{$shop->name}}</h1>
                    <h4><q>{{$shop->description}}</q></h4>
                    <p><i class="fa fa-location-arrow"></i> {{$shop->location_address}}</p>
                    <p><i class="fa fa-phone"></i> {{$shop->phone}}</p>
                    <p><i class="fa fa-clock-o"></i> {{date("Y-m-d",strtotime($shop->created_at))}}</p>
                </div>
                <div class="col-sm-3" style="">
                    <div class="col-sm-6" style="text-align: center; background-color: #1abc9c;padding-top: 7%;color: white;margin: auto">
                        <h4><b>{{$order}}</b></h4>
                        <p>Transaksi</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12" style="border: 1px solid #1abc9c; margin:3%;">
                <div class="col-sm-6" style="margin-top: 20px;margin-bottom : 20px;border: 1px solid #1abc9c;">
                    <p style="margin-top: 2%"><b>Kualitas Produk</b></p>
                    <div class="col-sm-6" style="text-align: center;">
                        <h1>{{$total_value}}</h1>
                        <?php $j=0; $temp=(float)$total_value; ?>
                        @for($j; $j<$temp; $j++)
                            <span class="fa fa-star checked"></span>
                        @endfor

                        <?php $j=0 ?>
                        @for($j; $j<(5-$temp); $j++)
                            <span class="fa fa-star"></span>
                        @endfor
                        <p>{{$countstar}} Review</p>
                    </div>
                    <div class="col-sm-6">
                        @for($i=1;$i<=5;$i++)
                            <p>
                                <?php $j=0 ?>
                                @for($j; $j<$i; $j++)
                                    <span class="fa fa-star checked"></span>
                                @endfor

                                <?php $j=0 ?>
                                @for($j; $j<(5-$i); $j++)
                                    <span class="fa fa-star"></span>
                                @endfor

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$star[$i-1]}}
                            </p>
                        @endfor
                    </div>
                </div>
                {{--<div class="col-sm-2"></div>--}}
                <div class="col-sm-6" style="padding-top: 20px">
                    <div class="col-sm-12">
                        <div id="1bulan" class="tabcontent">
                            <p style="text-align: left"><b>Statistik Transaksi</b></p>
                            <h1>{{$order1bln}}</h1>
                            <p>Transaksi</p>
                        </div>

                        <div id="3bulan" class="tabcontent">
                            <p style="text-align: left"><b>Statistik Transaksi</b></p>
                            <h1>{{$order3bln}}</h1>
                            <p>Transaksi</p>
                        </div>

                        <div id="6bulan" class="tabcontent">
                            <p style="text-align: left"><b>Statistik Transaksi</b></p>
                            <h1>{{$order6bln}}</h1>
                            <p>Transaksi</p>
                        </div>

                        <button class="tablink" onclick="openCity('1bulan', this, '#38c1a3')" id="defaultOpen">1 Bulan</button>
                        <button class="tablink" onclick="openCity('3bulan', this, '#38c1a3')">3 Bulan</button>
                        <button class="tablink" onclick="openCity('6bulan', this, '#38c1a3')">6 Bulan</button>

                        <script>
                            function openCity(cityName,elmnt,color) {
                                var i, tabcontent, tablinks;
                                tabcontent = document.getElementsByClassName("tabcontent");
                                for (i = 0; i < tabcontent.length; i++) {
                                    tabcontent[i].style.display = "none";
                                }
                                tablinks = document.getElementsByClassName("tablink");
                                for (i = 0; i < tablinks.length; i++) {
                                    tablinks[i].style.backgroundColor = "";
                                }
                                document.getElementById(cityName).style.display = "block";
                                elmnt.style.backgroundColor = color;

                            }
                            // Get the element with id="defaultOpen" and click on it
                            document.getElementById("defaultOpen").click();
                        </script>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection