<!-- header.blade.php -->

<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="{{ asset('js/app.js') }}" ></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- above are copied from app.blade.php -->
    <!-- for star rating -->
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Delivery</title>
    <link rel="alternative stylesheet" href="{{ asset("css/style.css") }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset("css/stylesheet.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/superstylesheet.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("css/mobile.css") }}" />
    <script src="{{ asset("js/mobile.js") }}" type="text/javascript"></script>
    @yield('header-extra')
</head>


<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('myAccount')}}">
                                        {{ __('My Account') }} </a>
                                    <a class="dropdown-item" href="{{ route('myOrders')}}">
                                        {{ __('My Orders')}} </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div id="page">
        <div id="header">
            <div>
                <a href="index.html" class="logo"><img src="/static/images/logo.png" alt=""></a>
                <ul id="navigation">
                    <li class="selected">
                        <a href="/">Reselect Store</a>
                    </li>
                    <li class="menu">
                        <a href="/stores/1/menu">Listings</a>
                    </li>
                    <li>
                        <a href="/cart">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="body" class="home">   


@yield('front-content')

<!--footer.blade.php -->

</div>
        <div id="footer">
            <div>
                <a href="/login">Use this to login if you already have a account</a>
                <div class="connect">
                    <a href="http://freewebsitetemplates.com/go/facebook/" class="facebook">facebook</a>
                    <a href="http://freewebsitetemplates.com/go/twitter/" class="twitter">twitter</a>
                    <a href="http://freewebsitetemplates.com/go/googleplus/" class="googleplus">googleplus</a>
                    <a href="http://pinterest.com/fwtemplates/" class="pinterest">pinterest</a>
                </div>
                <p>&copy; 2023 Freeeze. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</body>

</html>



