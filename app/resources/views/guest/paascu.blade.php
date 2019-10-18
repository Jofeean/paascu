@extends('master')

@section('title')
PAASCU: About Org
@endsection

@section('nav')
<div id="navbar-full">
  <div id="navbar">
    @include('includes.nav')
    <div class="blurred-container">
      <div class="img-src" style="background-image: url('assets/img/cropped.jpg')">
        <div class="container">
          <div class="space"></div>
          <div class="space"></div>
          <h1>PAASCU Organization</h1>
        </div>
      </div>
    </div>
  </div>
  <!--  end navbar -->
</div>
@endsection
<!-- end menu-dropdown -->

@section('main')

<div class="main">
  <div class="container tim-container">
    <div class="row">
      <div class="col-md-12">
        <h1>PAASCU Organization</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10">
        <p>
          PAASCU is governed by a 15-person Board of Directors elected at large by
          members during the annual General Assembly. It has seven Commissions with five
          to seven members each to perform its mandate. These are the Commissions on
          Graduate Education, Medical Education, Engineering Education, Tertiary
          Education, Integrated Basic Education, Secondary Education and Elementary
          Education. The Commission members are recommended during the General
          Assembly and appointed by the Board.
        </p>
        <p>
          The Commissions plan and initiate projects for each level, revise survey
          instruments, and train accreditors and team chairs. Moreover, they review the
          reports of the survey teams before these are submitted to the Board.
          PAASCU’s day to day operations are handled by a Secretariat which is headed by
          the Executive Director. The Secretariat takes care of the logistics of the survey
          visits, invites accreditors, prepares reports and forms, and implements the projects
          of the Commissions.
        </p>
        <p>
          Over a thousand volunteer accreditors from all over the country visit the
          institutions in accreditation team of six (6) to twelve (12) members depending on
          the number of programs being accredited.
        </p>
      </div>
      <div class="col-md-2">
        @include('includes.about')
      </div>
    </div>
  </div>
  <div class="space"></div>
</div>

@include('includes.footer')
@endsection