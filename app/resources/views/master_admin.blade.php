<!DOCTYPE html>
<html ng-app="app" ng-controller="main">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <!-- Bootstrap CSS CDN -->

    <link href="{{ url('bootstrap3/css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ url('bootstrap3/css/font-awesome.css') }}" rel="stylesheet"/>

    <link href="{{ url('assets/sass/gsdk.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/demo.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/loading.css') }}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ url("assets/css/nav.css") }}">
    <link rel="stylesheet" href="{{ url("assets/css/froala.pkgd.min.css") }}">
    <link href="{{ url('assets/css/cropper.css') }}" rel="stylesheet"/>

    <!-- Font Awesome JS -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet" type="text/css">
    @yield('css')
</head>

<body>

<div class="wrapper">
    @yield('nav')

    @yield('main')
</div>


<script src="{{ url('jquery/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>

<script src="{{ url('bootstrap3/js/bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/gsdk-checkbox.js') }}"></script>
<script src="{{ url('assets/js/gsdk-radio.js') }}"></script>
<script src="{{ url('assets/js/gsdk-bootstrapswitch.js') }}"></script>
<script src="{{ url('assets/js/get-shit-done.js') }}"></script>
<script src="{{ url("assets/js/popper.min.js") }}"></script>

<script src="{{ url('assets/js/custom.js') }}"></script>
<script src="{{ url('assets/js/froala.pkgd.min.js') }}"></script>
<script src="{{ url('assets/js/angular.min.js') }}"></script>
<script src="{{ url('assets/js/sweetalert2@8.js') }}"></script>

@yield('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
</body>

</html>
