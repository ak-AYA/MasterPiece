@extends('website.main')
@section('title', 'Services')
@section('content')


<!-- Add custom hover effect using CSS -->
<style>
.info-card {
    border: 2px solid #dcdcdc;
    transition: transform 0.3s, box-shadow 0.3s;
}

.info-card:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

@media (max-width: 767px) {
    .hero-image img {
        height: 300px;
    }

    .service-details {
        flex-direction: column;
    }

    .service-details .description-box {
        padding-right: 0;
    }

    .service-details .d-flex {
        flex-direction: column;
    }
}
</style>

<section id="our-services" class="text-center mt-5 pt-5">
    <div class="container mt-5">
        <div class="row">
            <!-- Categories Sidebar -->
            <div class="col-md-3 mb-4">
                <div class="post-sidebar">
                    <!-- Sidebar Categories -->
                    <div class="widget sidebar-categories bg-gray border rounded-3 p-3 mb-5">
                        <h5 class="widget-title text-uppercase border-bottom pb-3 mb-3">Services We Offer</h5>
                        <ul class="list-unstyled">
                            <!-- Link to All Services -->
                            <li class="{{ !isset($selectedCategory) ? 'active' : '' }}">
                                <a href="{{ route('website.services.index') }}"
                                    class="item-anchor text-capitalize d-flex align-items-center">
                                    <svg width="18" height="18">
                                        <use xlink:href="#alt-arrow-right-bold"></use>
                                    </svg>All Services
                                </a>
                            </li>
                            <!-- Specific Categories -->
                            @foreach($categories as $category)
                            <li
                                class="{{ isset($selectedCategory) && $selectedCategory->id == $category->id ? 'active' : '' }}">
                                <a href="{{ route('website.services.category', $category->id) }}"
                                    class="item-anchor text-capitalize d-flex align-items-center">
                                    <svg width="18" height="18">
                                        <use xlink:href="#alt-arrow-right-bold"></use>
                                    </svg>{{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- get Two services from the same Category -->
                    <div class="widget sidebar-services bg-gray border rounded-3 p-3 mt-4">
                        <h5 class="widget-title text-uppercase border-bottom pb-3 mb-3">Our Services</h5>
                        <ul class="list-unstyled">
                            @foreach($services->where('id', '!=', $service->id)->take(2) as $relatedService)
                            <li>
                                <div class="service-card mb-3">
                                    <img src="{{ asset('storage/' . $relatedService->image) }}"
                                        alt="{{ $relatedService->name }}" class="img-fluid mb-3 rounded-4"
                                        style="width: 100%; height: 150px; object-fit: cover;">
                                    <h6 class="service-title">{{ $relatedService->name }}</h6>
                                    <a href="{{ route('website.services.details', ['id' => $relatedService->id]) }}"
                                        class="btn btn-primary btn-sm mb-5">View Details</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>



                </div>
            </div>

            <main class="post-grid col-md-9">
                <div class="row">
                    <article class="post-item">
                        <!-- Title Section -->
                        <div class="section-title mb-3">
                            <p class="mb-2 fs-4 text-capitalize">Providing the best</p>
                            <h1>{{ $service->name }}</h1> <!-- Service Name -->
                        </div>

                        <!-- Image Section with Button -->
                        <div class="hero-image position-relative col-12">
                            @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}"
                                class="img-fluid mb-5 rounded-4" style="width: 100%; height: 500px; object-fit: cover;">
                            @else
                            <img src="images/single-service-img.jpg" alt="single-service"
                                class="img-fluid mb-5 rounded-4" style="width: 100%; height: 500px; object-fit: cover;">
                            @endif

                            <!-- Booking Button on the Image -->
                            <div class="position-absolute top-50 start-50 translate-middle text-center">
                                @if(Auth::guard('web')->check() && Auth::guard('web')->user()->role_id == 2)
                                <a href="{{ route('user.booking.page', ['serviceId' => $service->id]) }}"
                                    class="btn btn-primary btn-lg px-5 py-3 rounded-pill">
                                    Book Now <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                                @else
                                <a href="{{ route('website.login.user') }}"
                                    class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Login Now</a>
                                @endif
                            </div>
                        </div>

                        <!-- Service Details Section with Flexbox Layout -->
                        <div class="service-details d-flex flex-column flex-md-row">
                            <!-- Description Section (80%) -->
                            <div class="description-box" style="flex: 70%; padding-right: 30px; text-align: justify;">
                                <p>{{ $service->description }}</p> <!-- Description Text -->
                            </div>

                            <!-- Price and Duration Section (20%) -->
                            <div class="d-flex flex-column"
                                style="flex: 20%; border: 2px solid #f0f0f0; border-radius: 10px; padding: 10px;">
                                <!-- Price Info Card -->
                                <div class="info-card p-2 rounded-3 mb-3"
                                    style="background-color: #f7f7f7; transition: transform 0.3s;">
                                    <h6 class="text-primary widget-title pb-2 fw-semibold">Price</h6>
                                    <p class="h5 mb-0">JD {{ number_format($service->price, 2) }}</p>
                                </div>

                                <!-- Duration Info Card -->
                                <div class="info-card p-2 rounded-3 mb-3"
                                    style="background-color: #f7f7f7; transition: transform 0.3s;">
                                    <h6 class="text-primary widget-title pb-2 fw-semibold">Duration</h6>
                                    <p class="h5 mb-0">{{ $service->duration }}</p>
                                </div>

                                <!-- Provider Info Card -->
                                <div class="info-card p-2 rounded-3"
                                    style="background-color: #f7f7f7; transition: transform 0.3s;">
                                    <h6 class="text-primary widget-title pb-2 fw-semibold">Provider</h6>
                                    <p class="h5 mb-0">{{ $service->provider->name }}</p>
                                </div>
                            </div>
                        </div>

                    </article>

                    <!-- Reviews Section -->
                    <section id="testimonial" class="padding-small">
                        <div class="container">
                            <div class="align-items-center">
                                <div class="review-content">
                                    <div class="swiper testimonial-swiper">
                                        <div class="swiper-wrapper">
                                            @foreach($providerReviews as $review)
                                            <div class="swiper-slide">
                                                <div class="review-item">
                                                    <div class="review bg-gray border rounded-3 p-4">
                                                        <div class="review-star d-flex mb-2">
                                                            @for($i = 0; $i < $review->stars; $i++)
                                                                <svg class="star me-1 text-warning" width="16"
                                                                    height="16">
                                                                    <use xlink:href="#star" />
                                                                </svg>
                                                                @endfor
                                                        </div>
                                                        <blockquote class="mb-0">
                                                            <p class="mb-0">“{{ $review->text }}”</p>
                                                        </blockquote>
                                                    </div>
                                                    <div class="author-detail mt-4 d-flex align-items-center">
                                                        <div class="author-text">
                                                            <h6 class="name mb-0">{{ $review->user->name }}</h6>
                                                            <span
                                                                class="time text-capitalize">{{ $review->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-pagination position-relative pt-5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </main>


        </div>
    </div>
</section>





@endsection