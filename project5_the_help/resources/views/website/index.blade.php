@extends('website.main')
@section('title', 'Index')
@section('content')


<section id="slider" class="mt-5 pt-4">
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

<section id="features" class="padding-small">
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

<section id="our-services" class="mb-5"
    style="background-image: url('/assetts/images/services-bg.png'); background-repeat: no-repeat; background-position: center;">
    <div class="section-title mb-5 text-center">
        <p class="mb-2 fs-4 text-capitalize">How it works ?</p>
        <h3>How it works</h3>
    </div>
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
            <div class="swiper-slide mt-3 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service2.jpg" alt="img">
                <h6 class="mb-0"><a href="service-single.html">Window Cleaning</a></h6>
                <p>Enjoy crystal-clear views with free window cleaning services.</p>
            </div>
            <div class="swiper-slide mt-3 service text-center">
                <img class="rounded-circle mb-4 img-fluid" src="{{asset  ('assetts') }}/images/service4.jpg" alt="img">
                <h6 class="mb-0"><a href="service-single.html">Roof Cleaning</a></h6>
                <p>Create a hygienic workplace commercial cleaning services.</p>
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
            <h3>Why To Choose Us</h3>
          </div>
          <p>At SuperClean, we prioritize customer satisfaction and tailor our services to meet your specific needs. Using cutting-edge equipment and eco-friendly products, we leave no detail untouched, providing thorough and meticulous cleaning for every corner of your space.</p>
          <a class="btn btn-primary mt-4" href="services.html">Get to knoow us</a>
        </div>

        <div class="col-md-6 mt-4">

          <div class="row">
        
            <div class="col-md-6">
              <div class="counter-info text-center">
                <div class="counter-number text-primary display-2 fw-semibold d-flex align-items-center justify-content-center">
                  <span class="counter-prefix">+</span>
                  <h5 class="timer display-4 fw-bold m-0">5120</h5>
                </div>
                <p class="counter-description">Happy Clients</p>
              </div>
            </div>
    
            <div class="col-md-6">
              <div class="counter-info text-center">
                <div class="counter-number text-primary display-2 fw-semibold d-flex align-items-center justify-content-center">
                  <span class="counter-prefix">+</span>
                  <h5 class="timer display-4 fw-bold m-0" data-to="5120" data-speed="8000">26</h5>
                </div>
                <p class="counter-description">Total Branches</p>
              </div>
            </div>
    
            <div class="col-md-6">
              <div class="counter-info text-center">
                <div class="counter-number text-primary display-2 fw-semibold d-flex align-items-center justify-content-center">
                  <span class="counter-prefix">+</span>
                  <h5 class="timer display-4 fw-bold m-0" data-to="5120" data-speed="8000">54</h5>
                </div>
                <p class="counter-description">Pro Cleaners</p>
              </div>
            </div>
    
            <div class="col-md-6">
              <div class="counter-info text-center">
                <div class="counter-number text-primary display-2 fw-semibold d-flex align-items-center justify-content-center">
                  <span class="counter-prefix">+</span>
                  <h5 class="timer display-4 fw-bold m-0" data-to="5120" data-speed="8000">10</h5>
                </div>
                <p class="counter-description">Years Experience</p>
              </div>
            </div>
    
          </div>  

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