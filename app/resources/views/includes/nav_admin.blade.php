<nav id="sidebar">
    <div class="sidebar-header" style="color: black">
        <h3><b>PAASCU <br>
                Admin</b></h3>
        <strong>PA</strong>
    </div>

    <ul class="list-unstyled components">
        <li class="{{ url()->current() == url("admin") ? 'active': ' '}}">
            <a href="{{ url("admin") }}">
                <i class="fa fa-desktop"></i>
                Live Preview
            </a>
        </li>
        <li class="{{ url()->current() == url("admin/common") ? 'active': ' '}}">
            <a href="{{ url('admin/common') }}">
                <i class="fa fa-copy"></i>
                Common Page
            </a>
        </li>
        <li class="{{ url()->current() == url("admin/landing-page") ? 'active': ' '}}">
            <a href="{{ url("admin/landing-page") }}">
                <i class="fa fa-home"></i>
                Landing Page</a>
        </li>
        <li>
            <a href="#aboutSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-suitcase"></i>
                About Page<span class="caret"></span>
            </a>
            <ul class="collapse list-unstyled sub" id="aboutSubMenu">
                <li class="{{ url()->current() == url("admin/about-us") ? 'active': ' '}}">
                    <a href="{{ url('admin/about-us') }}">About us</a>
                </li>
                <li class="{{ url()->current() == url("admin/about-paascu") ? 'active': ' '}}">
                    <a href="{{ url('admin/about-paascu') }}">Paascu Org</a>
                </li>
                <li class="{{ url()->current() == url("admin/vision-mission-core-values") ? 'active': ' '}}">
                    <a href="{{ url('admin/vision-mission-core-values') }}">Vision Mission, Objectives and Core
                        Values</a>
                </li>
                <li class="{{ url()->current() == url("admin/board-members") ? 'active': ' '}}">
                    <a href="{{ url('admin/board-members') }}">Board Members</a>
                </li>
                <li class="{{ url()->current() == url("admin/commission") ? 'active': ' '}}">
                    <a href="{{ url('admin/commission') }}">Commission Members</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#accreditationSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-certificate"></i>
                Accreditation Page<span class="caret"></span>
            </a>
            <ul class="collapse list-unstyled sub" id="accreditationSubMenu">
                <li class="{{ url()->current() == url("admin/about-accreditation") ? 'active': ' '}}">
                    <a href="{{ url('admin/about-accreditation') }}">What is accreditation</a>
                </li>
                <li class="{{ url()->current() == url("admin/accreditation-process") ? 'active': ' '}}">
                    <a href="{{ url('admin/accreditation-process') }}">Accreditation Process</a>
                </li>
                <li class="{{ url()->current() == url("admin/accredited-programs") ? 'active': ' '}}">
                    <a href="{{ url('admin/accredited-programs') }}">Accredited Programs</a>
                </li>
                <li class="{{ url()->current() == url("admin/standards") ? 'active': ' '}}">
                    <a href="{{ url('admin/standards') }}">Standards</a>
                </li>
                <li class="{{ url()->current() == url("admin/benefits") ? 'active': ' '}}">
                    <a href="{{ url('admin/benefits') }}">Benefits, Incentives and Advantages</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-building-o"></i>
                Members
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-calendar"></i>
                News and Events
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-sign-out"></i>
                Logout
            </a>
        </li>
    </ul>

    {{--    <ul class="list-unstyled CTAs">--}}
    {{--        <li>--}}
    {{--            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>--}}
    {{--        </li>--}}
    {{--        <li>--}}
    {{--            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>--}}
    {{--        </li>--}}
    {{--    </ul>--}}
</nav>
