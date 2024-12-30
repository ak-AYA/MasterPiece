@extends('website.main')
@section('title', 'Services')
@section('content')




<style>
    .sidebar-categories li.active a {
        font-weight: bold;
        color: #EE8E1E !important;
        text-decoration: none;
    }

    .search-box .input-group {
        max-width: 400px;
        border: 1px solid #ddd;
        border-radius: 25px;
        overflow: hidden;
        background-color: #f9f9f9;
        transition: box-shadow 0.3s ease;
    }

    .search-box .input-group:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .search-box input.form-control {
        border: none;
        background: transparent;
        border-radius: 0;
    }

    .search-box input.form-control:focus {
        box-shadow: none;
        outline: none;
    }

    .search-box button {
        border: none;
        border-radius: 0;
        color: white;
        transition: background-color 0.3s ease;
    }
</style>
<section id="our-services" class="text-center mt-5 pt-4">
    <div class="container mt-5">
        <div class="row">
            <!-- Categories Sidebar -->
            <div class="col-md-3 mb-4">
                <div class="post-sidebar">
                    <!-- Sidebar Categories -->
                    <div class="widget sidebar-categories bg-gray border rounded-3 p-3 mb-5">
                        <h5 class="widget-title text-uppercase border-bottom pb-3 mb-3">Services We Offer</h5>
                        <ul class="list-unstyled">
                            <li class="{{ request()->routeIs('website.services.index') ? 'active' : '' }}">
                                <a href="{{ route('website.services.index') }}" class="item-anchor text-capitalize d-flex align-items-center">
                                    <svg width="18" height="18">
                                        <use xlink:href="#alt-arrow-right-bold"></use>
                                    </svg>
                                    All Services
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li class="{{ request()->routeIs('website.services.category') && request()->route('id') == $category->id ? 'active' : '' }}">
                                    <a href="{{ route('website.services.category', $category->id) }}" class="item-anchor text-capitalize d-flex align-items-center">
                                        <svg width="18" height="18">
                                            <use xlink:href="#alt-arrow-right-bold"></use>
                                        </svg>
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Have Any Questions Section -->
                    <div class="widget sidebar-any-questions bg-gray border rounded-3 p-3">
                        <h5 class="widget-title text-uppercase border-bottom pb-3 mb-3">Have any questions?</h5>
                        <form action="#" method="POST">
                            <input type="text" name="name" placeholder="Full Name" class="form-control mb-3" required>
                            <input type="email" name="email" placeholder="Email" class="form-control mb-3" required>
                            <textarea name="details" placeholder="Details" rows="4" class="form-control mb-3" required></textarea>
                            <button type="submit" class="btn btn-primary btn-block btn-pill text-uppercase">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <!-- Category Name -->
                    <h5 class="text-uppercase m-0">
                        {{ $selectedCategory->name ?? 'All Services' }}
                    </h5>

                    <!-- Search Section -->
                    <form action="{{ route('website.services.services.search') }}" method="GET" class="search-box d-flex align-items-center">
                        <div class="input-group">
                            <input type="search" id="search-input" name="query" class="form-control shadow-none" placeholder="Search services..." aria-label="Search">
                            <button class="btn btn-primary shadow-none" type="submit">
                                <svg class="search" width="20" height="20">
                                    <use xlink:href="#search"></use>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Search Results -->
                <div id="loading-spinner" class="text-center" style="display:none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div id="search-results" class="mt-3"></div>

                <!-- Services Grid -->
                <div id="services-grid" class="row">
                    @forelse($services as $service)
                        <div class="col-md-4 mb-4">
                            <a href="{{ route('website.services.details', ['id' => $service->id]) }}" class="text-decoration-none">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="card-img-top rounded-top" style="height: 150px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title font-weight-bold">{{ $service->name }}</h6>
                                        <p class="card-text text-muted">{{ $service->category->name ?? 'N/A' }} <br></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span id="rating-stars-{{ $service->id }}"></span>
                                            Jd {{ number_format($service->price, 2) }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">No services available for this category.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <nav aria-label="Page navigation" class="d-flex justify-content-center mt-4">
                {{ $services->links() }}
            </nav>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('search-input');
    const servicesGrid = document.getElementById('services-grid');
    const loadingSpinner = document.getElementById('loading-spinner');

    // Handle input event for search
    searchInput.addEventListener('input', function () {
        const searchQuery = searchInput.value;

        if (!searchQuery.trim()) {
            servicesGrid.innerHTML = ''; // Clear if input is empty
            return;
        }

        // Show the loading spinner
        loadingSpinner.style.display = 'block';

        // Perform the AJAX request
        fetch(`{{ route('website.services.services.search') }}?query=${searchQuery}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            servicesGrid.innerHTML = ''; // Clear the previous results

            if (data.length > 0) {
                data.forEach(service => {
                    // Create the card HTML for each service
                    const serviceCard = `
                        <div class="col-md-4 mb-4">
                            <a href="{{ url('website/services/details') }}/${service.id}" class="text-decoration-none">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ asset('storage/${service.image}') }}" alt="${service.name}" class="card-img-top rounded-top" style="height: 150px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title font-weight-bold">${service.name}</h6>
                                        <p class="card-text text-muted">${service.category_name ?? 'N/A'} <br></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span id="rating-stars-${service.id}"></span>
                                            Jd ${service.price.toFixed(2)}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `;
                    servicesGrid.innerHTML += serviceCard;

                    // Dynamically generate the rating stars
                    let starsHTML = '';
                    for (let i = 1; i <= 5; i++) {
                        if (i <= Math.floor(service.provider_rating)) {
                            starsHTML += '<i class="fas fa-star" style="color: gold;"></i>';
                        } else if (i <= Math.ceil(service.provider_rating)) {
                            starsHTML += '<i class="fas fa-star-half-alt" style="color: gold;"></i>';
                        } else {
                            starsHTML += '<i class="far fa-star" style="color: gold;"></i>';
                        }
                    }
                    document.getElementById(`rating-stars-${service.id}`).innerHTML = starsHTML;
                });
            } else {
                servicesGrid.innerHTML = '<p class="text-muted">No services found matching your search.</p>';
            }

            // Hide the loading spinner
            loadingSpinner.style.display = 'none';
        })
        .catch(error => {
            console.error('Error:', error);
            servicesGrid.innerHTML = '<p class="text-muted">Something went wrong. Please try again later.</p>';
            loadingSpinner.style.display = 'none';
        });
    });
});
</script>



@endsection