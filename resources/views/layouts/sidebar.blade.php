<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <label style="font-size: 31px;margin-left: 45px;">CRM</label>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('company.list') }}">
                        <i class="fas fa-users text-primary"></i> Companies
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees.list') }}">
                        <i class="fas fa-users text-primary"></i> Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <i class="ni ni-settings-gear-65 text-primary"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
