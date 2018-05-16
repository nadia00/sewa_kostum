<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bootstrap E-commerce Templates</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<!-- bootstrap -->
	<link href="{{asset('public/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">

	<link href="{{asset('public/themes/css/bootstrappage.css')}}" rel="stylesheet"/>

	<!-- global styles -->
	<link href="{{asset('public/themes/css/flexslider.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/themes/css/main.css')}}" rel="stylesheet"/>
	<!-- scripts -->
	<script src="{{asset('public/themes/js/jquery-1.7.2.min.js')}}"></script>
	<script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/themes/js/superfish.js')}}"></script>
	<script src="{{asset('public/themes/js/jquery.scrolltotop.js')}}"></script>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<div id="top-bar" class="container">
	<div class="row">
		<div class="span4">
			<form method="POST" class="search_form">
				<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
			</form>
		</div>

		<div class="span8">
			<div class="account pull-right">
				<ul class="user-menu">
					@guest
						<li><a href="{{ route('login') }}">Login</a></li>
					@else
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								Logout
							</a></li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					@endguest
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="wrapper" class="container">
	<section class="navbar main-menu">
		<div class="navbar-inner main-menu">
			<a href=" {{url('/')}} " class="logo pull-left"><img src="{{asset('public/themes/images/logo.png')}}" class="site_logo" alt="Logo"></a>

			<nav id="menu" class="pull-right">
				<ul>
                    @guest
					    <li><a href="#">Kategori</a></li>
					@else
                        <li><a href="#">Kategori</a></li>
						<li><a href="#">Notifikasi</a>
                        @if(view('home'))
                            @role('user-seller')
                            <li><a href="#">Toko-Ku</a>
                                <ul>
                                    <li><a href="{{url('/user/myshop')}}">Profil Toko</a></li>
                                    <li><a href="./products.html">Tambah Kostum</a></li>
                                    <li><a href="./products.html">Daftar Kostum</a></li>
                                    <li><a href="./products.html">Tambah Penyewaan</a></li>
                                    <li><a href="./products.html">Penyewaan</a></li>
                                </ul>
                            </li>
                            @endrole
                            @role('user')
                            <li><a href="">Toko-Ku</a>
                                <ul>
                                    <li><a href="./products.html">Buka Toko</a></li>
                                </ul>
                            </li>
                            @endrole
                            <li><a href="#">Akun-ku</a>
                                <ul>
                                    <li><a href="./products.html">Profil-ku</a></li>
                                    <li><a href="./products.html">Sewa</a></li>
                                    <li><a href="./products.html">Review</a></li>
                                </ul>
                            </li>
                        @endif
					@endguest
				</ul>
			</nav>
		</div>
	</section>

	@if('route'==('/home'))
		<section  class="homepage-slider" id="home-slider">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<img src="themes/images/carousel/banner-1.jpg" alt="" />
					</li>
					<li>
						<img src="themes/images/carousel/banner-2.jpg" alt="" />
						<div class="intro">
							<h1>Mid season sale</h1>
							<p><span>Up to 50% Off</span></p>
							<p><span>On selected items online and in stores</span></p>
						</div>
					</li>
				</ul>
			</div>
		</section>
		<section class="header_text">
			We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates.
			<br/>Don't miss to use our cheap abd best bootstrap templates.
		</section>
	@else
		<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
			{{-- <h4><span>Login or Regsiter</span></h4> --}}
		</section>
	@endif
	@yield('content')
	<section id="footer-bar">
		<div class="row">
			<div class="span3">
				<h4>Navigation</h4>
				<ul class="nav">
					<li><a href="./index.html">Homepage</a></li>
					<li><a href="./about.html">About Us</a></li>
					<li><a href="./contact.html">Contac Us</a></li>
					<li><a href="./cart.html">Your Cart</a></li>
					<li><a href="./register.html">Login</a></li>
				</ul>
			</div>
			<div class="span4">
				<h4>My Account</h4>
				<ul class="nav">
					<li><a href="#">My Account</a></li>
					<li><a href="#">Order History</a></li>
					<li><a href="#">Wish List</a></li>
					<li><a href="#">Newsletter</a></li>
				</ul>
			</div>
			<div class="span5">
				<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
				<br/>
				<span class="social_icons">
					<a class="facebook" href="#">Facebook</a>
					<a class="twitter" href="#">Twitter</a>
					<a class="skype" href="#">Skype</a>
					<a class="vimeo" href="#">Vimeo</a>
				</span>
			</div>
		</div>
	</section>
	<section id="copyright">
		<span>Copyright 2013 bootstrappage template  All right reserved.</span>
	</section>
</div>
<script src="{{asset('public/themes/js/common.js')}}"></script>
<script src="{{asset('public/themes/js/jquery.flexslider-min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 4000,
                animationSpeed: 600,
                controlNav: false,
                directionNav: true,
                controlsContainer: ".flex-container" // the container that holds the flexslider
            });
        });
    });
</script>
</body>
</html>
