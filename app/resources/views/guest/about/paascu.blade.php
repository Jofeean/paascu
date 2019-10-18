@extends('master')

@section('title')
    PAASCU: About Paascu Org
@endsection

@section('nav')
    <div id="navbar-full">
        <div id="navbar">
            @include('includes.nav')
            <div class="blurred-container">
                <div class="img-src"
                     style="background-image: url('{{ url('assets/img/banners/' . $header->filename) }}')">
                    <div class="container">
                        <div class="space"></div>
                        <div class="space"></div>
                        <div class="fr-view">
                            {!! $content->title !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  end navbar -->
    </div>
@endsection
<!-- end menu-dropdown -->

@section('main')


    <div class="main bg-new">
        <div class="space"></div>
        <div class="container tim-container">
            <div class="row">
                <div class="col-md-10">
                    <div class="fr-view">
                        {!! $content->content !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <br> <br> <br>
                    @include('includes.about')
                </div>
            </div>
        </div>
        <div class="space"></div>
    </div>

    @include('includes.footer')
@endsection
