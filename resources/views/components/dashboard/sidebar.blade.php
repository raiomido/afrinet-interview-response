<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link">
        <img src="{{url('vendor/admin-lte/dist/img/AdminLTELogo.png')}}" alt="{{config('app.name')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{$user->image_link}}" class="img-circle elevation-2" alt="{{$user->name}}">
            </div>
            <div class="info">
                <a href="{{$user->image_link}}" target="_blank" class="d-block">{{$user->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('dashboard.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.companies.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Companies
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard.employees.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Employees
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                    <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
