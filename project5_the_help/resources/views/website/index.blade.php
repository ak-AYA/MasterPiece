@extends('website.main')
@section('title', 'Index')
@section('content')


<section id="slider" class="mt-4 pt-3">
    <div class="swiper slider position-relative">
        <div class="swiper-wrapper">
            <div class="swiper-slide d-flex"
                style="background-image: url('/assetts/images/slider-image.jpg'); background-size: cover; background-repeat: no-repeat; height: 80vh; background-position: center; height: 80vh;">
                <div class="banner-content px-5 py-4 text-center m-auto py-5 rounded-4 shadow">
                    <h2 class="mb-0">Best Cleaning Services</h2>
                    <p class="fs-4 text-capitalize">Welcome to Super Clean Services, your one-stop solution for
                        exceptional cleaning services!</p>

                    @if(Auth::guard('provider')->check())
                    <!-- provider -->
                    <a href="{{ route('website.services.index') }}" class="btn btn-primary">Explore Services</a>
                    @elseif(Auth::guard('web')->check())
                    <!-- users -->
                    <a href="{{ route('website.services.index') }}" class="btn btn-primary">Explore Services</a>
                    @else
                    <!-- not signed user-->
                    <a href="{{ route('website.register.user') }}" class="btn btn-primary">I'm A User</a>
                    <a href="{{ route('website.register.provider') }}" class="btn btn-secondary">I'm A Provider</a>
                    @endif
                </div>

            </div>

            <div class="swiper-slide d-flex"
                style="background-image: url('/assetts/images/slider-image1.jpg'); background-size: cover; background-repeat: no-repeat; height: 80vh; background-position: center; height: 80vh;">
                <div class="banner-content px-5 py-4 text-center m-auto py-5 rounded-4 shadow">
                    <h2 class="mb-0">Best Window Cleaning</h2>
                    <p class="fs-4 text-capitalize">Enjoy crystal-clear views with free window cleaning services. View
                        our cleaning services now!</p>
                    <a href="services.html" class="btn btn-primary mt-3">Our Services</a>
                </div>
            </div>
            <div class="swiper-slide d-flex"
                style="background-image: url('/assetts/images/slider-image.jpg'); background-size: cover; background-repeat: no-repeat; height: 80vh; background-position: center; height: 80vh;">
                <div class="banner-content px-5 py-4 text-center m-auto py-5 rounded-4 shadow">
                    <h2 class="mb-0">Best Cleaning Services</h2>
                    <p class="fs-4 text-capitalize">Welcome to Super Clean Services, your one-stop solution for
                        exceptional cleaning services!</p>
                    <a href="services.html" class="btn btn-primary mt-3">Our Services</a>
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

<section id="features" class="padding-medium">
    <div class="container">

        <div class="section-title mb-5 text-center">
            <p class="mb-2 fs-4 text-capitalize">What do we offer ?</p>
            <h3>Choose your service</h3>
        </div>

        <div class="row">

            @foreach($categories as $category)
            <div class="col-md-4">
                <a href="{{ route('website.services.category', ['id' => $category->id]) }}">
                    <div class="feature mb-4 text-center px-3 py-4 border rounded-3">
                        <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top"
                            alt="{{ $category->name }}" style="width: 100%; height: 50px; object-fit: contain;">
                        <hr>
                        <h6 class="mb-0">{{ $category->name }}</h6>
                        <hr>
                        <!-- <p>{{ $category->description }}</p> -->
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="call" class="margin-medium">
    <div class="container">
        <div class="position-relative rounded-4 overflow-hidden bg-accent-gradient">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <div class="call py-5 px-2">
                        <h2 class="text-light">Give us Call: 123 456 7891</h2>
                        <p class="fs-4 text-capitalize text-light">Our energetic and helpful team are always ready for
                            you.</p>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 ms-5 d-none d-lg-block">
                <svg class="light-blue-color" width="300" height="300">
                    <use xlink:href="#call-chat-rounded-outline"></use>
                </svg>
            </div>
        </div>
    </div>
</section>


<section id="our-services" class="padding-medium"
    style="background-image: url('/assetts/images/services-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div class="swiper services-swiper py-3">
        <div class="swiper-wrapper ms-0 ps-0 ms-sm-5 ps-sm-5">
            <div class="swiper-slide mt-5 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service1.jpg" alt="img">
                <h6 class="mb-0"><a href="service-single.html">Deep Cleaning</a></h6>
                <p>Our deep cleaning services leave no cranny untouched clean.</p>
            </div>
            <div class="swiper-slide service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service2.jpg" alt="img">
                <h6 class="mb-0"><a href="service-single.html">Window Cleaning</a></h6>
                <p>Enjoy crystal-clear views with free window cleaning services.</p>
            </div>
            <div class="swiper-slide mt-5 pt-5 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service3.jpg" alt="img">
                <h6 class="mb-0"><a href="service-single.html">Office Cleaning</a></h6>
                <p>Boost productivity and employee with well-maintained office.</p>
            </div>
            <div class="swiper-slide mt-5 pt-1 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service4.jpg" alt="img">
                <h6 class="mb-0"><a href="service-single.html">Roof Cleaning</a></h6>
                <p>Create a hygienic workplace commercial cleaning services.</p>
            </div>
            <div class="swiper-slide mt-3 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service5.jpg" alt="img">
                <h6 class="mb-0"><a href="service-single.html">Carpet Cleaning</a></h6>
                <p>Boost productivity and employee with well-maintained office.</p>
            </div>

        </div>
    </div>
</section>

<section id="testimonial" class="padding-medium">
    <div class="container">
        <div class="align-items-center">
            <div class="review-content">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="review-item">
                                <div class="review bg-gray border rounded-3 p-4">
                                    <div class="review-star d-flex mb-2">
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                    </div>
                                    <blockquote class="mb-0">
                                        <p class="mb-0">“A pellen tesque pretium feugiat vel mobi sagittis lorem habi
                                            tasse cursus ipsum quis nec eget facilisis. Quis nibh ut bindum nisl quis
                                            placerat proin tortor mattis.”</p>
                                    </blockquote>
                                </div>
                                <div class="author-detail mt-4 d-flex align-items-center">
                                    <img class="img-fluid me-3" src="{{asset  ('assetts') }}/images/reviewer1.jpg"
                                        alt="reviewer">
                                    <div class="author-text">
                                        <h6 class="name mb-0">James Rodrigo</h6>
                                        <span class="time text-capitalize">2 months ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-item">
                                <div class="review bg-gray border rounded-3 p-4">
                                    <div class="review-star d-flex mb-2">
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                    </div>
                                    <blockquote class="mb-0">
                                        <p class="mb-0">“A pellen tesque pretium feugiat vel mobi sagittis lorem habi
                                            tasse cursus ipsum quis nec eget facilisis. Quis nibh ut bindum nisl quis
                                            placerat proin tortor mattis.”</p>
                                    </blockquote>
                                </div>
                                <div class="author-detail mt-4 d-flex align-items-center">
                                    <img class="img-fluid me-3" src="{{asset  ('assetts') }}/images/reviewer2.jpg"
                                        alt="reviewer">
                                    <div class="author-text">
                                        <h6 class="name mb-0">Sarah anderson</h6>
                                        <span class="time text-capitalize">2 months ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-item">
                                <div class="review bg-gray border rounded-3 p-4">
                                    <div class="review-star d-flex mb-2">
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                    </div>
                                    <blockquote class="mb-0">
                                        <p class="mb-0">“A pellen tesque pretium feugiat vel mobi sagittis lorem habi
                                            tasse cursus ipsum quis nec eget facilisis. Quis nibh ut bindum nisl quis
                                            placerat proin tortor mattis.”</p>
                                    </blockquote>
                                </div>
                                <div class="author-detail mt-4 d-flex align-items-center">
                                    <img class="img-fluid me-3" src="{{asset  ('assetts') }}/images/reviewer3.jpg"
                                        alt="reviewer">
                                    <div class="author-text">
                                        <h6 class="name mb-0">Kelly Garcia</h6>
                                        <span class="time text-capitalize">2 months ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="review-item">
                                <div class="review bg-gray border rounded-3 p-4">
                                    <div class="review-star d-flex mb-2">
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                        <svg class="star me-1 text-warning" width="16" height="16">
                                            <use xlink:href="#star" />
                                        </svg>
                                    </div>
                                    <blockquote class="mb-0">
                                        <p class="mb-0">“A pellen tesque pretium feugiat vel mobi sagittis lorem habi
                                            tasse cursus ipsum quis nec eget facilisis. Quis nibh ut bindum nisl quis
                                            placerat proin tortor mattis.”</p>
                                    </blockquote>
                                </div>
                                <div class="author-detail mt-4 d-flex align-items-center">
                                    <img class="img-fluid me-3" src="{{asset  ('assetts') }}/images/reviewer1.jpg"
                                        alt="reviewer">
                                    <div class="author-text">
                                        <h6 class="name mb-0">James Rodrigo</h6>
                                        <span class="time text-capitalize">2 months ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination position-relative pt-5"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about-us" class="position-relative bg-gray padding-small">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="imageblock me-4">
                    <a type="button" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/W_tIumKa8VY"
                        data-bs-target="#myModal" class="play-btn position-relative">
                        <img class="img-fluid" src="{{asset  ('assetts') }}/images/about.png" alt="img">
                    </a>
                </div>
            </div>

            <div class="col-md-6 mt-5">
                <div class="section-title mb-4">
                    <p class="mb-2 fs-4 text-capitalize">Short Introduction</p>
                    <h3>Welcome To SuperClean</h3>
                </div>
                <p>Welcome to SuperClean Services, your trusted partner for top-tier cleaning solutions. With years of
                    industry expertise, we are committed to delivering extra cleaning services that exceed your
                    expectations. Our skilled and dedicated team takes pride in transforming spaces into immaculate
                    havens, ensuring cleanliness and hygiene for homes and businesses alike.
                    <br>
                    <br>
                    At SuperClean, we prioritize customer satisfaction and tailor our services to meet your specific
                    needs. Using cutting-edge equipment and eco-friendly products, we leave no detail untouched,
                    providing thorough and meticulous cleaning for every corner of your space.
                </p>
                <a class="btn btn-primary mt-4" href="about.html">Learn More</a>
            </div>

        </div>
    </div>
    <img class="pb-5 position-absolute d-none d-xxl-block end-0 bottom-0 w-auto"
        src="{{asset  ('assetts') }}/images/bg-pattern-img.png" alt="img">
</section>




<section id="pricing">
    <div class="container py-5">

        <div class="section-title mb-5 text-center">
            <p class="mb-2 fs-4 text-capitalize">Pricing Plans</p>
            <h3>Our Subscription</h3>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div
                    class="py-5 plan-post d-flex flex-column justify-content-between text-center border rounded-4 text-center my-4">
                    <div class="plan-top">
                        <p class="fs-4 text-capitalize text-primary mb-0">Basic</p>
                        <h2 class="d-inline mb-5">$200</h2><span class="fs-4">/month</span>
                        <div class="price-option mt-3">
                            <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                            <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                            <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                            <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                            <p><span class="price-tick">✓</span> Ipsum dolor</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline mx-auto mt-5">Subscribe</a>
                </div>
            </div>
            <div class="col-md-4">
                <div
                    class="py-5 plan-post d-flex flex-column justify-content-between text-center border rounded-4 text-center">
                    <div class="plan-top">
                        <p class="fs-4 text-capitalize text-primary mb-0">Premium</p>
                        <h2 class="d-inline mb-5">$300</h2><span class="fs-4">/month</span>
                        <div class="price-option mt-3">
                            <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                            <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                            <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                            <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                            <p><span class="price-tick">✓</span> Velit mir</p>
                            <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                            <p><span class="price-tick">✓</span> Rhoncus ivamus</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary mx-auto mt-5">Subscribe</a>
                </div>
            </div>
            <div class="col-md-4">
                <div
                    class="py-5 plan-post d-flex flex-column justify-content-between text-center border rounded-4 text-center my-4">
                    <div class="plan-top">
                        <p class="fs-4 text-capitalize text-primary mb-0">Ultimate</p>
                        <h2 class="d-inline mb-5">$1600</h2><span class="fs-4">/month</span>
                        <div class="price-option mt-3">
                            <p><span class="price-tick">✓</span> Quisque rhoncus</p>
                            <p><span class="price-tick">✓</span> Lorem ipsum dolor</p>
                            <p><span class="price-tick">✓</span> Vivamus velit mir</p>
                            <p><span class="price-tick">✓</span> Elit mir ivamus</p>
                            <p><span class="price-tick">✓</span> Ipsum dolor</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline mx-auto mt-5">Subscribe</a>
                </div>
            </div>

        </div>

    </div>
</section>

<section id="quote" class="bg-gray padding-small margin-medium">
    <div class="container text-center">
        <div class="section-title">
            <h3>Request a free quote</h3>
        </div>
        <form class="contact-form row mt-5">
            <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                <input type="text" name="name" placeholder="Full Name" class="w-100 border ps-4 rounded-3">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                <input type="email" name="email" placeholder="Email" class="w-100 border ps-4 rounded-3">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                <input type="text" name="phone" placeholder="Phone" class="w-100 border ps-4 rounded-3">
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                <input type="text" name="city" placeholder="City" class="w-100 border ps-4 rounded-3">
            </div>
            <div class="col-md-12 col-sm-12 mb-4">
                <input type="text" name="property" placeholder="Property Address" class="w-100 border ps-4 rounded-3">
            </div>
            <div class="col-md-12 col-sm-12 mb-4">
                <select class="form-select focus-transparent w-100 border rounded-3 ps-4" aria-invalid="false"
                    name="choose">
                    <option value="Select Your Service">Interested In</option>
                    <option value="Service">Deep Cleaning</option>
                    <option value="Service">Window Cleaning</option>
                    <option value="Service">Office Cleaning</option>
                    <option value="Service">Roof Cleaning</option>
                    <option value="Service">Carpet Cleaning</option>
                </select>
            </div>
            <div class="col-md-12 col-sm-12 mb-4">
                <textarea class="w-100 border p-3 ps-4 rounded-3" type="text" name="details"
                    placeholder="Details"></textarea>
            </div>
        </form>
        <a href="#" class="btn btn-medium btn-primary btn-pill mt-3 text-uppercase">Submit</a>
    </div>
</section>


<section id="faqs" class="bg-gray padding-small margin-medium mb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 accordion" id="accordion">
                <div class="accordion-item border-0 rounded-3 mb-3">
                    <h5 class="text-capitalize fw-regular accordion-header">
                        <button class="accordion-button bg-transparent focus-transparent text-capitalize shadow-none"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                            What areas do you serve ?
                        </button>
                    </h5>
                    <div id="collapseOne" class="accordion-collapse border-0 collapse show" data-bs-parent="#accordion">
                        <div class="accordion-body pt-0">
                            <p>SuperCleanPro Services operates in your place. We proudly serve both residential and
                                commercial properties within this area, delivering top-quality cleaning solutions to our
                                valued customers.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 rounded-3 mb-3">
                    <h5 class="text-capitalize fw-regular accordion-header">
                        <button
                            class="accordion-button bg-transparent collapsed focus-transparent text-capitalize shadow-none"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            Are your cleaning technicians trained and insured ?
                        </button>
                    </h5>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion">
                        <div class="accordion-body pt-0">
                            <p>SuperCleanPro Services operates in your place. We proudly serve both residential and
                                commercial properties within this area, delivering top-quality cleaning solutions to our
                                valued customers.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 rounded-3 mb-3">
                    <h5 class="text-capitalize fw-regular accordion-header">
                        <button
                            class="accordion-button bg-transparent collapsed focus-transparent text-capitalize shadow-none"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                            aria-expanded="false" aria-controls="collapseThree">
                            What cleaning products do you use ?
                        </button>
                    </h5>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordion">
                        <div class="accordion-body pt-0">
                            <p>SuperCleanPro Services operates in your place. We proudly serve both residential and
                                commercial properties within this area, delivering top-quality cleaning solutions to our
                                valued customers.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 rounded-3 mb-3">
                    <h5 class="text-capitalize fw-regular accordion-header">
                        <button
                            class="accordion-button bg-transparent collapsed focus-transparent text-capitalize shadow-none"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                            aria-controls="collapseFour">
                            How do you determine pricing for your services ?
                        </button>
                    </h5>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordion">
                        <div class="accordion-body pt-0">
                            <p>SuperCleanPro Services operates in your place. We proudly serve both residential and
                                commercial properties within this area, delivering top-quality cleaning solutions to our
                                valued customers.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 rounded-3 mb-3">
                    <h5 class="text-capitalize fw-regular accordion-header">
                        <button
                            class="accordion-button bg-transparent collapsed focus-transparent text-capitalize shadow-none"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                            aria-controls="collapseFive">
                            Do I need to provide cleaning equipment and supplies ?
                        </button>
                    </h5>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordion">
                        <div class="accordion-body pt-0">
                            <p>SuperCleanPro Services operates in your place. We proudly serve both residential and
                                commercial properties within this area, delivering top-quality cleaning solutions to our
                                valued customers.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</section>

<section id="contact-info" class="py-5 bg-accent-gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <svg class="star me-1 light-blue-color" width="90" height="90">
                    <use xlink:href="#call-chat-rounded-outline" />
                </svg>
                <div class="contact-info-text ms-3">
                    <h5 class="text-light mb-0">Give Us Call</h5>
                    <h5 class="fw-light text-light">123 456 7891</h5>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <svg class="star me-1 light-blue-color" width="90" height="90">
                    <use xlink:href="#point-on-map-outline" />
                </svg>
                <div class="contact-info-text ms-3">
                    <h5 class="text-light mb-0">Phoenix, Arizona</h5>
                    <h5 class="fw-light text-light">947 Dogwood Road</h5>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <svg class="star me-1 light-blue-color" width="90" height="90">
                    <use xlink:href="#pen-new-round-outline" />
                </svg>
                <div class="contact-info-text ms-3">
                    <h5 class="text-light mb-0">free quote</h5>
                    <h5 class="fw-light text-light text-decoration-underline"><a href="quote.html">Request quote</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection