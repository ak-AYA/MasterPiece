<header id="header">

    <nav id="primary-header" class="navbar navbar-expand-lg py-3 fixed-header">
        <div class="container">
            <a class="navbar-brand" href="{{ route('website.index') }}">
                <img src="{{asset  ('assetts') }}/images/Black White Minimalist Cleaning Company Logo.png" class="logo img-fluid" style="height: 60px; width: auto; object-fit: contain;">
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
                        <li class="nav-item px-3">
                            <a class="nav-link active p-0" aria-current="page"
                            class="navbar-brand"  href="{{ route('website.index') }}">Home</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link p-0" aria-current="page"
                            class="navbar-brand"  href="{{ route('website.services.index') }}">Services</a>
                        </li>
                        



                        <li class="nav-item search-dropdown ms-3 ms-lg-5 dropdown">
                            <a class="nav-link p-0 search dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                role="button" aria-expanded="false">
                                <svg class="search" width="24" height="24">
                                    <use xlink:href="#search"></use>
                                </svg>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end animate slide mt-3 border-0 p-3 shadow">
                                <li class="position-relative d-flex align-items-center p-0">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-primary position-absolute end-0" type="submit">
                                        <svg class="search" width="24" height="24">
                                            <use xlink:href="#search"></use>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>