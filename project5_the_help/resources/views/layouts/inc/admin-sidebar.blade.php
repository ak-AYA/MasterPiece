<style>
/* Sidebar background with a gradient of blues */
.sb-sidenav-dark {
    background: linear-gradient(180deg, #001f3d, #005f88, #0077b6);
}

/* Link text color for better readability */
.sb-sidenav-menu .nav-link {
    color: #ffffff !important;
    transition: background-color 0.3s, color 0.3s;
}

/* Icons color */
.sb-nav-link-icon i {
    color: #ffffff;
}

/* Hover effect for links */
.sb-sidenav-menu .nav-link:hover {
    background-color: rgba(0, 95, 136, 0.8);
    color: #ffffff;
    border-radius: 5px;
}

/* Active link styling */
.sb-sidenav-menu .nav-link.active {
    background-color: #005f88;
    border-left: 4px solid #0077b6;
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
</style>


<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Dashboard Link -->
                <div class="sb-sidenav-menu-heading">Management</div>

                <!-- Users Link -->
                <a class="nav-link" href="{{ route('admin.users') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                    Users
                </a>

                <!-- Providers Link -->
                <a class="nav-link" href="{{ route('admin.providers') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Providers
                </a>

                <!-- Categories Link -->
                <a class="nav-link" href="{{ route('admin.categories') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                    Categories
                </a>

                <!-- Services Link -->
                <a class="nav-link" href="{{ route('admin.services') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-concierge-bell"></i></div>
                    Services
                </a>

                <!-- Payments Link -->
                <a class="nav-link" href="{{ route('admin.payments') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                    Payments
                </a>

                <!-- Discounts Link -->
                <a class="nav-link" href="{{ route('admin.discounts') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-percent"></i></div>
                    Discounts
                </a>

                <!-- Bookings Link -->
                <a class="nav-link" href="{{ route('admin.bookings') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                    Bookings
                </a>

                <!-- Reviews Link -->
                <a class="nav-link" href="{{ route('admin.services') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                    Reviews
                </a>

                <!-- Contact Us Link -->
                <a class="nav-link" href="{{ route('admin.contact_us') }}">
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