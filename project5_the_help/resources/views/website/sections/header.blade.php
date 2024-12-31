

<header id="header">


<nav id="primary-header" class="navbar navbar-expand-lg py-3 fixed-header">
    <div class="container">
        <a class="navbar-brand" href="{{ route('website.index') }}">
            <img src="{{ asset('assetts/images/Black White Minimalist Cleaning Company Logo.png') }}" 
                 class="logo img-fluid" 
                 style="height: 60px; width: auto; object-fit: contain;">
        </a>
        <button class="navbar-toggler border-0 d-flex d-lg-none order-3 p-2 shadow-none" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false">
            <svg class="navbar-icon" width="60" height="60">
                <use xlink:href="#navbar-icon"></use>
            </svg>
        </button>
        <div class="header-bottom offcanvas offcanvas-end" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
            <div class="offcanvas-header px-4 pb-0">
                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas"
                        aria-label="Close" data-bs-target="#bdNavbar"></button>
            </div>
            <div class="offcanvas-body align-items-center justify-content-end">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <!-- Home Link -->
                    <li class="nav-item px-3">
                        <a class="nav-link {{ Route::currentRouteName() == 'website.index' ? 'active' : '' }}" 
                           href="{{ route('website.index') }}">Home</a>
                    </li>
                    <!-- Services Link -->
                    <li class="nav-item px-3">
                        <a class="nav-link {{ Route::currentRouteName() == 'website.services.index' ? 'active' : '' }}" 
                           href="{{ route('website.services.index') }}">Services</a>
                    </li>
                    <!-- User/Provider Dropdown -->
                    @if(Auth::guard('provider')->check())
                        <li class="nav-item px-3 dropdown">
                            <a class="nav-link dropdown-toggle {{ Request::is('provider/*') ? 'active' : '' }}" href="#" 
                               id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::guard('provider')->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" 
                                       href="{{ route('provider.provider.profile') }}">Profile</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('website.logout.provider') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @elseif(Auth::guard('web')->check())
                        <li class="nav-item px-3 dropdown">
                            <a class=" nav-link dropdown-toggle {{ Request::is('user/*') ? 'active' : '' }}" href="#" 
                               id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::guard('web')->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" 
                                       href="{{ route('user.user.profile') }}">Profile</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('website.logout.user') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>

</header>

