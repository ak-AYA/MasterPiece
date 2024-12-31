@extends('website.main')
@section('title', 'Services')
@section('content')


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

            <main class="post-grid col-md-9 ">
                <div class="row">
                    <article class="post-item">
                        <!-- Title Section -->
                        <div class="section-title mb-3">
                            <p class="mb-2 fs-4 text-capitalize">Providing the best</p>
                            <h1>{{ $service->name }}</h1> <!-- Service Name -->
                        </div>

                        <!-- Image Section with Button -->
                        <div class="hero-image position-relative">
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
                        <div class="service-details d-flex">
                            <!-- Description Section (80%) -->
                            <div class="description-box" style="flex: 70%; padding-right: 30px; text-align: justify;">
                                <p>{{ $service->description }}</p> <!-- Description Text -->
                            </div>

                            <!-- Price and Duration Section (20%) -->
                            <div class="d-flex flex-column"
                                style="flex: 20%; border: 2px solid #f0f0f0; border-radius: 10px; padding: 20px;">
                                <div class="info-card p-4 rounded-3 mb-3">
                                    <h6 class="text-primary widget-title pb-2 fw-semibold">Price</h6>
                                    <p class="h5 mb-0">JD {{ number_format($service->price, 2) }}</p>
                                </div>
                                <div class="info-card p-4 rounded-3">
                                    <h6 class="text-primary widget-title pb-2 fw-semibold">Duration</h6>
                                    <p class="h5 mb-0">{{ $service->duration }}</p>
                                </div>
                            </div>
                        </div>


                    </article>


                    <!-- Reviews Section -->
                    <div class="reviews-section p-4 bg-light rounded-3">
                        <h5 class="text mb-4"> Reviews</h5>

                        <!-- Review Card -->
                        <div class="review-card d-flex align-items-center mb-4 p-3 border rounded-3 shadow-sm">
                            <!-- User Image Section (20%) -->
                            <div class="user-image " style="flex: 20%;">
                                <img src="https://via.placeholder.com/80" alt="User Avatar"
                                    style="width: 100%; height: auto; object-fit: cover;">
                            </div>

                            <!-- User Info and Review Message Section (80%) -->
                            <div class="review-info" style="flex: 80%; padding-left: 20px; text-align: left;">
                                <!-- User Name -->
                                <h6 class="text-primary mb-1">John Doe</h6>

                                <!-- Rating -->
                                <div class="rating mb-2">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                </div>

                                <!-- Review Message -->
                                <p>This service was excellent! Highly recommend it. The team was professional, and the
                                    result exceeded my expectations.</p>

                                <!-- Review Date -->
                                <small class="text-muted">Reviewed on: January 20, 2024</small>
                            </div>

                        </div>
                    </div>

                </div>
            </main>


        </div>
    </div>
</section>





@endsection