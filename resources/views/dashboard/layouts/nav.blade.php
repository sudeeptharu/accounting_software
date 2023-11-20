{{--<!-- Navbar -->--}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    {{--<!-- Left navbar links -->--}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{--<li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>--}}
    </ul>

    {{--<!-- Right navbar links -->--}}
    <ul class="navbar-nav ml-auto">
        {{--<!-- Notifications Dropdown Menu -->--}}
        <li class="nav-item dropdown dropdown-notification">
            @csrf
            <a class="nav-link" data-toggle="dropdown" href="#" id="notification-icon-dashboard">
                <i class="far fa-bell fa-lg"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-left" id="notification-dropdown-dashboard">

            </div>

        </li>

    </ul>
</nav>
{{--<!-- /.navbar -->--}}
