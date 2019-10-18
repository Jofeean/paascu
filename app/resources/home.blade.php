@extends('master')

@section('title')
    PAASCU
@endsection

@section('css')
    <link rel="stylesheet" href="{{ url('owlcarousel/css/docs.theme.min.css') }}">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ url('owlcarousel/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('owlcarousel/owlcarousel/assets/owl.theme.default.min.css') }}">
@endsection

@section('nav')
    <div id="navbar-full">
        <div id="navbar">

            @include('includes.nav')
            <div class="blurred-container" style="height: 100vh">
                <div class="img-src">
                    <div class="fadeOut owl-carousel owl-theme">
                        <div class="item">
                            <img src="assets/img/carousel_blue.png" alt="Awesome Image">
                        </div>
                        <div class="item">
                            <img src="assets/img/carousel_green.png" alt="Awesome Image">
                        </div>
                        <div class="item">
                            <img src="assets/img/carousel_red.png" alt="Awesome Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@section('main')

    <div class="main bg-new">
        <div class="container tim-container">
            <div class="col-md-12" style="all:unset">
                <div class="fr-view">
                    {!! $content->content !!}
                </div>
            </div>
        </div>
        <div class="space-30"></div>
    </div>

    <div class="container-fluid">

        <div class="col-md-12" style="padding:0px">
            <div class="fadeOut owl-carousel owl-theme">
                @foreach($news as $new)
                    <div class="item"
                         style="background-image: linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.8)), url('{{ url('assets/img/news/'.$new->filename) }}');
                             background-size: cover;
                             background-position: center;
                             background-repeat: no-repeat;
                             padding-top: 5px; padding-bottom: 5px;">
                        <center>
                            <img src="{{ url('assets/img/news/'.$new->filename) }}" alt="{{ url('assets/img/news/'.$new->filename) }}"
                                 style="max-height: 600px; height: 600px; width: auto; max-width: 100%; object-fit: contain; ">
                        </center>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- </div> --}}

    @include('includes.footer')
@endsection

@section('js')
    <script src="{{ url('owlcarousel/vendors/jquery.min.js') }}"></script>
    <script src="{{ url('owlcarousel/owlcarousel/owl.carousel.js') }}"></script>
    <link rel="stylesheet" href="{{ url('owlcarousel/css/animate.css') }}">

    <script>
        jQuery(document).ready(function ($) {
            $('.fadeOut').owlCarousel({
                center: true,
                items: 1,
                animateOut: 'fadeOut',
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                dots: false,
            });
        });
    </script>

    <script src="{{ url('owlcarousel/vendors/highlight.js') }}"></script>
    <script src="{{ url('owlcarousel/js/app.js') }}"></script>
@endsection
