<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>@yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <link href="{{ url('bootstrap3/css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ url('bootstrap3/css/font-awesome.css') }}" rel="stylesheet"/>

    <link href="{{ url('assets/sass/gsdk.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/demo.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/backg.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ url("assets/css/froala_style.min.css") }}">

@yield('css')

<!--     Font Awesome     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

</head>

<body>
@yield('nav')

@yield('main')
<!-- end main -->

</body>

<script src="{{ url('jquery/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>

<script src="{{ url('bootstrap3/js/bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/gsdk-checkbox.js') }}"></script>
<script src="{{ url('assets/js/gsdk-radio.js') }}"></script>
<script src="{{ url('assets/js/gsdk-bootstrapswitch.js') }}"></script>
<script src="{{ url('assets/js/get-shit-done.js') }}"></script>

<script src="{{ url('assets/js/custom.js') }}"></script>

@yield('js')

</html>
