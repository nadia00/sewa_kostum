<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        CO-Shopper : Costume Rental
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="{{asset('public/page/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/page/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/page/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/page/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('public/page/css/owl.theme.css')}}" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="{{asset('public/page/css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="{{asset('public/page/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('public/multiple/fastselect.css')}}" rel="stylesheet">


    <link rel="shortcut icon" href="favicon.png">

    <!-- *** SCRIPTS TO INCLUDE ***
    _________________________________________________________ -->
    <script src="{{asset('public/page/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('public/page/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/page/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('public/page/js/waypoints.min.js')}}"></script>
    <script src="{{asset('public/page/js/modernizr.js')}}"></script>
    <script src="{{asset('public/page/js/bootstrap-hover-dropdown.js')}}"></script>
    <script src="{{asset('public/page/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/page/js/front.js')}}"></script>
    <script src="{{asset('public/page/js/respond.min.js')}}"></script>
    {{--<script src="{{asset('public/multiple/fastselect.js')}}"></script>--}}
    <script src="{{asset('public/multiple/fastselect.standalone.min.js')}}"></script>

    <link rel="stylesheet" href="css/rating.css">

    <style>
        .fstElement{
            width: 100%;
        }
        .checked {
            color: orange;
        }
    </style>

    @yield('custom_css')

</head>

<body>

<!-- *** TOPBAR ***
_________________________________________________________ -->
<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                @guest
                    <li><a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a class="nav-link" href="{{route('register')}}" >Register</a>
                    </li>
                @else
                    @role('user')
                    <li><a class="nav-link" href="{{route('user.create-shop')}}">Buat Toko</a>
                    </li>
                    @endrole
                    @role('user-seller')
                    <li><a class="nav-link" href="{{route('admin-shop.product')}}">Toko</a>
                    </li>
                    @endrole
                    <li><a class="nav-link" href="{{url('/user')}}">Akun</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">User login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('login')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <input type="email" placeholder="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="password" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="{{route('register')}}"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you much more access!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- *** TOP BAR END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="{{url('/')}}" data-animate-hover="bounce">
                <img style="height: 50px" src="{{asset('public/logo.png')}}" alt="Obaju logo" class="hidden-xs">
                <img style="height: 50px" src="{{asset('public/logo.png')}}" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>

        <!--/.navbar-header -->
        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="{{url('/')}}">Home</a>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Category <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <ul>
                                            <li><a href="{{ route('product.all') }}">All Categories</a></li>
                                            @foreach($kategoris as $categories)
                                                <li>
                                                    <a href="{{url('category',[$categories->id])}}">{{$categories->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary"  data-toggle="modal" data-target="#cart" onclick="getCart()">
                    <span class="sr-only">Toggle Cart</span>
                    <i class="fa fa-shopping-cart"></i><span id="changer"></span>
                </button>
                <script>
                    setInterval(function () {
                        $.get("{{url('user/cart/total')}}", function (data) {
                            document.getElementById("changer").innerHTML = data;
                        })
                    },1000)
                </script>
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->
{{--modal address--}}
<div class="modal fade" id="add_address" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Tambah Alamat</h4>
            </div>
            <div class="modal-body">
                <form action="{{route("user.address")}}" method="post" id="address_form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Kota" name="city">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Kecamatan" name="district">
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" placeholder="Alamat" name="street"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Kode Pos" name="zip_code">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Telepon" name="phone_number">
                    </div>
                </form>

                <p class="text-center">
                    <button class="btn btn-primary" form="address_form"><i class="fa fa-sign-in"></i> Submit</button>
                </p>

            </div>
        </div>
    </div>
</div>

{{--modal cart--}}
<div id="cart" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Your Chart</h4>
            </div>
            <div class="modal-body">
                <div id="refresh-cart">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="clearCart()">Clear All</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
    function getCart(){
        $.get("{{url('user/cart/show')}}", function (data) {
            document.getElementById("refresh-cart").innerHTML = data;
        })
    }
    function deleteCart(rowId){
        $.get("{{url('user/cart/delete')}}/"+rowId, function (data) {
            getCart()
        })

    }
    function clearCart(){
        $.get("{{url('user/cart/destroy')}}", function (data) {
            getCart()
        })

    }

</script>

@yield('content')


<!-- *** FOOTER ***
 _________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">


                <h4>User section</h4>

                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="{{route('register')}}">Regiter</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Categories</h4>

                <ul>
                    <li>
                        <a href="{{ route('product.all') }}">All Categories</a>
                    </li>
                    @foreach($kategoris as $categories)
                        <li>
                            <a href="{{url('category',[$categories->id])}}">{{$categories->name}}</a>
                        </li>
                    @endforeach
                </ul>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->

<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">© 2018 Nadia R</p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious</a> & <a href="https://fity.cz">Fity</a></p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->

<script src="js/rating.js"></script>

@yield('custom_js')

</div>
<!-- /#all -->





</body>
</html>