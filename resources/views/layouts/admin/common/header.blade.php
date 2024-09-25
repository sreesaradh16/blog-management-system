<div class="page-header">
    <a aria-label="Hide Sidebar" class="app-sidebar__toggle close-toggle" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
    <div>
        @yield("heading")
        @yield('breadcrumb')
    </div>
    <div class="d-flex  ml-auto header-right-icons header-search-icon">
        <div class="dropdown d-md-flex">
            <a class="nav-link icon full-screen-link nav-link-bg">
                <i class="fe fe-maximize fullscreen-button"></i>
            </a>
        </div>
        <div class="dropdown profile-1">
            <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                <span>
                    <img src="{{ asset('images/avatar.jpg')}}" alt="profile-user" class="avatar  profile-user brround cover-image">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <div class="drop-heading">
                    <div class="text-center">
                        <h5 class="text-dark mb-0">{{ ucfirst(auth()->user()->name) }}</h5>
                        <small class="text-muted">{{ auth()->user()->email }}</small>
                    </div>
                </div>
                <div class="dropdown-divider m-0"></div>
                <div class="dropdown-divider mt-0"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>