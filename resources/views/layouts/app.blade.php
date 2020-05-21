<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Jio Platforms Limited">
        <meta name="author" content="Jio Platforms Limited">
        <meta name="keywords" content="Jio Platforms Limited">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ URL::asset('images/icons/favicon.ico') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/animate/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/css-hamburgers/hamburgers.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/animsition/css/animsition.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/select2/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">

    </head>
    <body>

        @yield('content')

        <script type="text/javascript" src="{{ URL::asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('vendor/animsition/js/animsition.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('vendor/bootstrap/js/popper.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('vendor/select2/select2.min.js') }}"></script>
        <script>
$(".selection-2").select2({
    minimumResultsForSearch: 20,
    dropdownParent: $('#dropDownSelect1')
});
        </script>
        <script type="text/javascript" src="{{ URL::asset('vendor/daterangepicker/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('vendor/countdowntime/countdowntime.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    </body>
</html>