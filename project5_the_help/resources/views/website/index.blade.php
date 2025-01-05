@extends('website.main')
@section('title', 'Index')
@section('content')


<section id="slider" class="mt-4 pt-4">
    <div class="swiper slider position-relative">
        <div class="swiper-wrapper">
            <div class="swiper-slide d-flex" style="height: 100vh; position: relative;">
                <video autoplay muted loop class="background-video"
                    style="object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
                    <source src="/assetts/images/7578552-uhd_3840_2160_30fps.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="banner-content px-5 py-4 text-center m-auto py-5 rounded-4 shadow">
                    <h2 class="mb-0">Best Cleaning Services</h2>
                    <p class="fs-4 text-capitalize">Welcome to The Help Services, your one-stop solution for
                        exceptional cleaning services!</p>

                    @if(Auth::guard('provider')->check())
                    <!-- provider -->
                    <a href="{{ route('website.services.index') }}" class="btn btn-primary">Explore Services</a>
                    @elseif(Auth::guard('web')->check())
                    <!-- users -->
                    <a href="{{ route('website.services.index') }}" class="btn btn-primary">Explore Services</a>
                    @else
                    <!-- not signed user-->
                    <a href="{{ route('website.login.user') }}" class="btn btn-primary">Need help?</a>
                    <a href="{{ route('website.login.provider') }}" class="btn btn-secondary">Ready to Help!</a>
                    @endif
                </div>
            </div>

            <div class="swiper-slide d-flex"
                style="background-image: url('/assetts/images/pexels-matilda-wormwood-4099259.jpg'); background-size: cover; background-repeat: no-repeat; height: 100vh; background-position: center;">
                <div class="banner-content px-5 py-4 text-center m-auto py-5 rounded-4 shadow">
                    <h2 class="mb-0">Set back and relax</h2>
                    <p class="fs-4 text-capitalize">Experience ultimate comfort and save precious time with our expert
                        services. Let us handle the details so you can focus on what truly matters. Enjoy a hassle-free
                        experience today!</p>

                    <a href="{{ route('website.services.index') }}" class="btn btn-primary mt-3">Our Services</a>
                </div>
            </div>
        </div>

        <div class="position-absolute top-0 bottom-0 end-0 m-auto me-0 me-md-5 main-slider-button-next">
            <svg class="chevron-forward-circle light-color" width="60" height="60">
                <use xlink:href="#chevron-forward-circle"></use>
            </svg>
        </div>
        <div class="position-absolute top-0 bottom-0 start-0 m-auto ms-0 ms-md-5 main-slider-button-prev">
            <svg class="chevron-back-circle light-color" width="60" height="60">
                <use xlink:href="#chevron-back-circle"></use>
            </svg>
        </div>
    </div>
</section>

<section id="features" class="position-relative bg-gray mb-5 pt-5 pb-5">
    <div class="container">

        <div class="section-title mb-5 text-center">
            <p class="mb-2 fs-4 text-capitalize">What do we offer ?</p>
            <h3>Choose your service</h3>
        </div>

        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4">
                <a href="{{ route('website.services.category', ['id' => $category->id]) }}">
                    <div class="feature mb-4 text-center px-3 py-4 border rounded-3"
                        style="position: relative; transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;">
                        <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top"
                            alt="{{ $category->name }}"
                            style="width: 100%; height: 50px; object-fit: contain; transition: transform 0.3s ease;">
                        <hr>
                        <h6 class="mb-0">{{ $category->name }}</h6>
                        <hr>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="our-services" class="mb-5"
    style="background-image: url('/assetts/images/services-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div class="section-title mb-5 text-center">
        <p class="mb-2 fs-4 text-capitalize">How it works ?</p>
        <h3>How it works</h3>
    </div>
    <div class="swiper services-swiper py-3">
        <div class="swiper-wrapper ms-0 ps-0 ms-sm-5 ps-sm-5">
            <div class="swiper-slide mt-5 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset('assetts')}}/images/cleaning service (1).gif"
                    alt="img">
                <h6 class="mb-0">Choose Your Cleaning Service</h6>
                <p>Let us know what you would like cleaned, and we'll give you the best prices and providers on the
                    market.</p>
            </div>
            <div class="swiper-slide mt-5 pt-5 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset('assetts')}}/images/Events.gif" alt="img">
                <h6 class="mb-0">Schedule Your Cleaning Time</h6>
                <p>Our online booking system lets you choose the most convenient date and time for you.</p>
            </div>
            <div class="swiper-slide mt-5 pt-1 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset('assetts')}}/images/Drinking tea.gif" alt="img">
                <h6 class="mb-0">Enjoy A Clean, Tidy Home</h6>
                <p>Now you just sit back and relax, while we ensure your home is spotless, top-to-bottom.</p>
            </div>
            <div class="swiper-slide mt-5 pt-1 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset('assetts')}}/images/Online Review.gif"
                    alt="img">
                <h6 class="mb-0">Leave A Review</h6>
                <p>Your feedback means a lot to us! Every review helps us improve and serve you better. Share your
                    experience!</p>
            </div>
            <div class="swiper-slide mt-5 pt-1 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset('assetts')}}/images/Conversation.gif" alt="img">
                <h6 class="mb-0">Recommend Us</h6>
                <p>Loved our service? Share it with your friends and let them enjoy the same quality!</p>
            </div>
            <div class="swiper-slide mt-5 pt-1 service text-center">

                <h6 class="mb-0"></h6>
                <p></p>
            </div>

        </div>
    </div>
</section>



<section id="about-us" class="position-relative bg-gray mb-5 pt-5 pb-5">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="imageblock me-4">

                    <img class="img-fluid" src="{{asset  ('assetts') }}/images/about1.jpg" alt="img">

                </div>
            </div>

            <div class="col-md-6 mt-5">
                <div class="section-title mb-4">
                    <p class="mb-2 fs-4 text-capitalize">Explore Our Features</p>
                    <h3>Welcome To The Help</h3>
                </div>
                <br>
                <!-- Points Section -->
                <div class="row">
                    <!-- Section for Users -->
                    <div class="col-lg-6 col-md-6 service">
                        <h4 class="mb-3">For Users</h4>
                        <div class="price-option mt-3">
                            <p><span class="text-primary">✓</span> Easy online booking system</p>
                            <p><span class="text-primary">✓</span> Affordable and transparent pricing</p>
                            <p><span class="text-primary">✓</span> Flexible scheduling to fit your needs</p>
                            <p><span class="text-primary">✓</span> Access to top-rated service providers</p>
                            <p><span class="text-primary">✓</span> Eco-friendly and safe cleaning solutions</p>
                            <p><span class="text-primary">✓</span> 24/7 customer support for assistance</p>
                        </div>
                    </div>

                    <!-- Section for Providers -->
                    <div class="col-lg-6 col-md-6 service">
                        <h4 class="mb-3">For Providers</h4>
                        <div class="price-option mt-3">
                            <p><span class="text-primary">✓</span> Increase visibility and reach more clients</p>
                            <p><span class="text-primary">✓</span> Flexible work schedule management</p>
                            <p><span class="text-primary">✓</span> Transparent payout system</p>
                            <p><span class="text-primary">✓</span> Tools and resources for professional growth</p>
                            <p><span class="text-primary">✓</span> Dedicated support for service providers</p>
                            <p><span class="text-primary">✓</span> Build trust with verified user reviews</p>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

</section>



<section id="about-us-2">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6 mt-4">
                <div class="section-title mb-4">
                    <p class="mb-2 fs-4 text-capitalize">Our Achievements</p>
                    <h3>Why We Stand Out</h3>
                </div>
                <p>At Help My Cleaning, we prioritize your satisfaction by customizing our services to match your unique
                    needs. With advanced tools and eco-friendly products, we ensure every corner of your space is
                    spotless and cared for with attention to detail.</p>
                <a class="btn btn-primary mt-4" href="{{ route('website.about.index')}}">Get to knoow us</a>
            </div>

            <div class="col-md-6 mt-4">

                <div class="row">

                    <div class="col-md-6">
                        <div class="counter-info text-center">
                            <div
                                class="counter-number text-primary display-2 fw-semibold d-flex align-items-center justify-content-center">
                                <span class="counter-prefix">+</span>
                                <h5 class="timer display-4 fw-bold m-0" data-to="120">0</h5>
                            </div>
                            <p class="counter-description">Happy Clients</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="counter-info text-center">
                            <div
                                class="counter-number text-primary display-2 fw-semibold d-flex align-items-center justify-content-center">
                                <span class="counter-prefix">+</span>
                                <h5 class="timer display-4 fw-bold m-0" data-to="26">0</h5>
                            </div>
                            <p class="counter-description">Total Branches</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="counter-info text-center">
                            <div
                                class="counter-number text-primary display-2 fw-semibold d-flex align-items-center justify-content-center">
                                <span class="counter-prefix">+</span>
                                <h5 class="timer display-4 fw-bold m-0" data-to="50">0</h5>
                            </div>
                            <p class="counter-description">Pro Cleaners</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="counter-info text-center">
                            <div
                                class="counter-number text-primary display-2 fw-semibold d-flex align-items-center justify-content-center">
                                <span class="counter-prefix">+</span>
                                <h5 class="timer display-4 fw-bold m-0" data-to="3">0</h5>
                            </div>
                            <p class="counter-description">Years Experience</p>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>
</section>

<section id="testimonial" class="padding-small">
    <div class="container">
        <div class="align-items-center">
            <div class="review-content">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">
                        @foreach($topReviews as $review)
                        <div class="swiper-slide">
                            <div class="review-item">
                                <div class="review bg-gray border rounded-3 p-4">
                                    <div class="review-star d-flex mb-2">
                                        @for($i = 0; $i < $review->stars; $i++)
                                            <svg class="star me-1 text-warning" width="16" height="16">
                                                <use xlink:href="#star" />
                                            </svg>
                                            @endfor
                                    </div>
                                    <blockquote class="mb-0">
                                        <p class="mb-0">“{{ $review->text }}”</p>
                                    </blockquote>
                                </div>
                                <div class="author-detail mt-4 d-flex align-items-center">
                                    <!-- <i class="fas fa-user-circle fa-3x me-3"></i> -->
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





<script>
document.querySelectorAll('.feature').forEach(function(card) {
    card.addEventListener('mouseenter', function() {
        card.style.transform = 'translateY(-10px)';
        card.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.1)';
        card.style.backgroundColor = '#f8f9fa';
    });
    card.addEventListener('mouseleave', function() {
        card.style.transform = 'translateY(0)';
        card.style.boxShadow = 'none';
        card.style.backgroundColor = '';
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.timer');

    const startCounter = (counter) => {
        const target = +counter.getAttribute('data-to');
        const speed = 200; // Speed of the animation
        const updateCount = () => {
            const count = +counter.innerText;
            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 10);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                startCounter(entry.target);
                observer.unobserve(entry.target); // Ensure animation runs only once
            }
        });
    }, {
        threshold: 0.75 // Trigger when 75% of the element is visible
    });

    counters.forEach(counter => {
        observer.observe(counter);
    });
});
</script>

@endsection