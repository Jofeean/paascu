@extends('master_admin')

@section('title')
    PAASCU - Admin
@endsection

@section('nav')
    @include("includes.nav_admin")
@endsection

@section('main')
    <div id="content" class="bg-new">

        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">

                <a class="navbar-brand" href="#" id="sidebarCollapse">
                    <i class="fa fa-bars"></i>&nbsp;
                    Live Preview</a>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="embed-responsive embed-responsive-29by9">
                <iframe class="embed-responsive-item" src="{{ url("") }}" style="width: 100%; height: 60vh"></iframe>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
