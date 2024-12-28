@extends('website.main')
@section('title', 'Services')
@section('content')




<style>
    .sidebar-categories li.active a {
        font-weight: bold;
        color: #EE8E1E !important;
        text-decoration: none;
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
                                <a href="{{ route('website.services.index') }}"
                                    class="item-anchor text-capitalize d-flex align-items-center">
                                    <svg width="18" height="18">
                                        <use xlink:href="#alt-arrow-right-bold"></use>
                                    </svg>
                                    All Services
                                </a>
                            </li>

                            @foreach($categories as $category)
                            <li
                                class="{{ request()->routeIs('website.services.category') && request()->route('id') == $category->id ? 'active' : '' }}">
                                <a href="{{ route('website.services.category', $category->id) }}"
                                    class="item-anchor text-capitalize d-flex align-items-center">
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
                            <textarea name="details" placeholder="Details" rows="4" class="form-control mb-3"
                                required></textarea>
                            <button type="submit"
                                class="btn btn-primary btn-block btn-pill text-uppercase">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <div class="col-md-9">
                <h5 class="mb-4 text-uppercase">
                    {{ $selectedCategory->name ?? 'All Services' }}
                </h5>
                <div class="row">
                    @forelse($services as $service)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('website.services.details', ['id' => $service->id]) }}"
                            class="text-decoration-none">

                            <div class="card h-100 shadow-sm">

                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}"
                                    class="card-img-top rounded-top" style="height: 150px; object-fit: cover;">







                                <div class="card-body">
                                    <h6 class="card-title font-weight-bold">{{ $service->name }}</h6>
                                    <p class="card-text text-muted">
                                        {{ $service->category->name ?? 'N/A' }} <br>

                                    </p>

                                    <!--avg reviews-->
                                    @php
                                    $providerRating = $service->provider->reviews()->avg('stars') ?? 0;
                                    @endphp

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>
                                            @for($i = 1; $i <= 5; $i++) @if($i <=floor($providerRating)) <i
                                                class="fas fa-star" style="color: gold;"></i>
                                                @elseif($i <= ceil($providerRating)) <i class="fas fa-star-half-alt"
                                                    style="color: gold;"></i>
                                                    @else
                                                    <i class="far fa-star" style="color: gold;"></i>
                                                    @endif
                                                    @endfor
                                        </span>
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


        </div>
    </div>
</section>


<script>
    document.addEventListener("DOMContentLoaded", function() {
    const sidebarLinks = document.querySelectorAll('.sidebar-categories li a');
    const currentUrl = window.location.href;


    sidebarLinks.forEach(link => {
        if (link.href === currentUrl) {
            link.parentElement.classList.add('active');
        } else {
            link.parentElement.classList.remove('active');
        }
    });
    });
</script>


@endsection