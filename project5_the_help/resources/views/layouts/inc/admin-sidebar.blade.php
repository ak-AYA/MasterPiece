<style>
    /* Sidebar background with a gradient of blues */
    .sb-sidenav-dark {
        background: #001f3d;

    }

    /* Link text color for better readability */
    .sb-sidenav-menu .nav-link {
        color: #f6f9fd !important;
        transition: background-color 0.3s, color 0.3s;
        margin-left: 15px;
    }

    /* Icons color */
    .sb-nav-link-icon i {
        color: #f6f9fd !important;
    }

    /* Hover effect for links */
    .sb-sidenav-menu .nav-link:hover {
        background-color: rgba(236, 236, 236, 0.8);
        color: #f6f9fd;
        border-radius: 5px;
    }

    /* Active link styling */
    .sb-sidenav-menu .nav-link.active {
        background-color: #f6f9fd;
        border-left: 4px solid #f6f9fd;
        color: #ffffff;
    }

    /* Footer section background and text color */
    .sb-sidenav-footer {
        background: #003f66;
        color: #ffffff;
    }

    /* Footer text styling */
    .sb-sidenav-footer .small {
        color: #cce7ff;
    }

    .sb-nav-link-icon i:hover {
        transform: scale(1.2);
        transition: transform 0.3s ease-in-out;
    }

    .sb-sidenav-menu .nav-link.active {
        background: linear-gradient(90deg, #003d66, #006699);
        border-left: 5px solid #00ace6;
    }
    /* Active link styling */
    .sb-sidenav-menu .nav-link.active {
        background: linear-gradient(90deg, #003d66, #006699);
        border-left: 5px solid #00ace6;
        color: #ffffff;
    }

</style>


<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
            
                <!-- Dashboard Link -->
                <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    The Help Dashboard
                </a>

                <hr>
                <!-- Dashboard Link -->
                <div class="sb-sidenav-menu-heading">Management</div>

                <!-- Users Link -->
                <a class="nav-link @if(request()->routeIs('admin.users')) active @endif"
                    href="{{ route('admin.users') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                    Users
                </a>

                <!-- Providers Link -->
                <a class="nav-link @if(request()->routeIs('admin.providers')) active @endif"
                    href="{{ route('admin.providers') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Providers
                </a>

                <!-- Categories Link -->
                <a class="nav-link @if(request()->routeIs('admin.categories')) active @endif"
                    href="{{ route('admin.categories') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                    Categories
                </a>

                <!-- Services Link -->
                <a class="nav-link @if(request()->routeIs('admin.services')) active @endif"
                    href="{{ route('admin.services') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-concierge-bell"></i></div>
                    Services
                </a>

                <!-- Payments Link -->
                <a class="nav-link @if(request()->routeIs('admin.payments')) active @endif"
                    href="{{ route('admin.payments') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                    Payments
                </a>

                <!-- Discounts Link -->
                <!-- <a class="nav-link" href="{{ route('admin.discounts') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-percent"></i></div>
                    Discounts
                </a> -->

                <!-- Bookings Link -->
                <a class="nav-link @if(request()->routeIs('admin.bookings')) active @endif"
                    href="{{ route('admin.bookings') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                    Bookings
                </a>

                <!-- Reviews Link -->
                <a class="nav-link @if(request()->routeIs('admin.reviews')) active @endif"
                    href="{{ route('admin.reviews') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                    Reviews
                </a>

                <!-- Contact Us Link -->
                <a class="nav-link @if(request()->routeIs('admin.contact_us')) active @endif"
                    href="{{ route('admin.contact_us') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-phone-alt"></i></div>
                    Contact Us
                </a>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>