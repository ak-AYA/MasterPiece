<style>
    /* Make the navbar background the same navy blue as the sidebar */
    .navbar-dark.bg-dark {
        background-color: #001f3d !important;
        /* Navy Blue */
    }

    /* Change the navbar text color */
    .navbar-brand,
    .nav-link {
        color: #ffffff !important;
        /* White text */
    }

    /* Add a subtle hover effect for navbar links */
    .navbar-nav .nav-link:hover {
        color: #ffd700 !important;
        /* Gold color on hover */
    }

    /* Dropdown menu enhancements */
    .dropdown-menu {
        background-color: #001f3d;
        /* Navy blue background for the dropdown */
        border-radius: 5px;
        /* Rounded corners */
    }

    .dropdown-menu .dropdown-item {
        color: white;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #005f88;
        color: white;
    }

    /* Smooth transition for icons and navbar links */
    .nav-link,
    .navbar-brand,
    .dropdown-toggle {
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover,
    .dropdown-item:hover {
        color: #ffd700 !important;
        /* Gold color on hover */
    }

    .navbar-dark .navbar-nav .nav-link {
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.6);
    }

    .navbar-brand:hover {
        text-decoration: underline;
        text-decoration-color: #00ace6;
        transition: text-decoration 0.3s ease;
    }
</style>


<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

    <!-- Navbar Brand-->
    <span class="navbar-brand ps-3">The Help Dashboard</span>

    <!-- Navbar Content Wrapper -->
    <div class="d-flex w-100 justify-content-between align-items-center">

        <!-- Sidebar Toggle -->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 ps-5" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>