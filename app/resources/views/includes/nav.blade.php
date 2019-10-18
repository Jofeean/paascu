<nav class="navbar navbar-ct-green navbar-transparent navbar-fixed-top" role="navigation">
    <!-- <div class="alert alert-success hidden">
                <div class="container">
                  <b>Lorem ipsum</b> dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                  laoreet dolore magna aliquam erat volutpat.
                </div>
              </div> -->

    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">PAASCU</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('about') }}">About Us</a></li>
                <li><a href="{{ url('/what-is-accreditation') }}">Accreditation</a></li>
                <li><a href="{{ url('') }}">Members</a></li>
                <li><a href="{{ url('') }}">News and Events</a></li>
            </ul>

        </div>
    </div>
</nav>
