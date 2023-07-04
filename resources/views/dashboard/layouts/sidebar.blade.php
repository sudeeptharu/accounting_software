{{--<!-- Main Sidebar Container -->--}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{--<!-- Brand Logo -->--}}
    <a href="{{url('/dashboard/')}}" class="brand-link">
        <img src="{{ url('https://ui-avatars.com/api/?name='.config('app.name') . '&background=d6d8d9&color=343a40&length=4&size=256&font-size=0.33&bold=true')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    {{--<!-- Sidebar -->--}}
    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                <li class="nav-item">
                    <a href="" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt nav-icon"></i> <p>Logout</p>
                    </a>
                </li >
                <li class="nav-item">
                    <a href="{{url('ledger')}}" class="nav-link">
                        <i class="fa-sharp fa-solid fa-circle-info nav-icon" ></i><p>Ledger</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('ledger-classification')}}" class="nav-link">
                        <i class="fa-sharp fa-solid fa-circle-user nav-icon"></i><p>Ledger Classification</p>
                    </a>
                </li><li class="nav-item">
                    <a href="{{url('ledger-group')}}" class="nav-link">
                        <i class="fa-sharp fa-solid fa-inbox nav-icon"></i><p>Ledger Group</p>
                    </a>
                </li>
                </li><li class="nav-item">
                    <a href="{{url('ledger-type')}}" class="nav-link">
                        <i class="fa-sharp fa-solid fa-inbox nav-icon"></i><p>Ledger Type</p>
                    </a>
                </li>
                </li><li class="nav-item">
                    <a href="{{url('voucher-type')}}" class="nav-link">
                        <i class="fa-sharp fa-solid fa-inbox nav-icon"></i><p>Voucher Type</p>
                    </a>
                </li>

            </ul>
        </nav>
        {{--<!-- /.sidebar-menu -->--}}
    </div>
    {{--<!-- /.sidebar -->--}}
</aside>
