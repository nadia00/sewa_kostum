<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sewa Kostum') }}</title>
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
    <script src="{{asset('public/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand"  href="{{ url('/') }}">{{ config('app.name', 'Sewa Kostum') }}</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li><a class="nav-link" href="{{ route('user.shop') }}">{{ __('Toko-Ku') }}</a></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}, {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </div>
    </div>
</nav>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

</body>
</html>