<html>
<head>
    <title> APP - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
@section('sidebar')



@show

<div class="container justify-content-center" style="margin-top: 10em">

    @yield('content')

</div>
</body>
</html>
