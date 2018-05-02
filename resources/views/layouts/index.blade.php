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

    <div id="page">
        <div id="body" class="home">   


@yield('front-content')

<!--footer.blade.php -->

</div>
        <div id="footer">
            <div>
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



