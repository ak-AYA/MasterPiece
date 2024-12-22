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
                            @foreach($categories as $category)
                            <li class="{{ !isset($selectedCategoryId) ? 'active' : '' }}">
                                <a href="{{ route('website.services.index') }}"
                                    class="item-anchor text-capitalize d-flex align-items-center">
                                    <svg width="18" height="18">
                                        <use xlink:href="#alt-arrow-right-bold"></use>
                                    </svg>
                                    All Services
                                </a>
                            </li>

                            @endforeach
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
                                @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top rounded-top"
                                    alt="{{ $service->name }}" style="height: 150px; object-fit: cover;">
                                @else
                                <img src="path/to/default-image.jpg" class="card-img-top rounded-top"
                                    alt="No image available" style="height: 150px; object-fit: cover;">
                                @endif
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



<section id="other-services" class="padding-small margin-medium mb-0"
    style="background-image: url('{{ asset('assetts/images/other-services-bg.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h3>Additional Services</h3>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 service">
                <div class="price-option mt-3">
                    <p><span class="text-primary">✓</span> Quisque rhoncus</p>
                    <p><span class="text-primary">✓</span> Lorem ipsum dolor</p>
                    <p><span class="text-primary">✓</span> Vivamus velit mir</p>
                    <p><span class="text-primary">✓</span> Elit mir ivamus</p>
                    <p><span class="text-primary">✓</span> Velit mir</p>
                    <p><span class="text-primary">✓</span> Quisque rhoncus</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 service">
                <div class="price-option mt-3">
                    <p><span class="text-primary">✓</span> Quisque rhoncus</p>
                    <p><span class="text-primary">✓</span> Lorem ipsum dolor</p>
                    <p><span class="text-primary">✓</span> Vivamus velit mir</p>
                    <p><span class="text-primary">✓</span> Elit mir ivamus</p>
                    <p><span class="text-primary">✓</span> Velit mir</p>
                    <p><span class="text-primary">✓</span> Quisque rhoncus</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 service">
                <div class="price-option mt-3">
                    <p><span class="text-primary">✓</span> Quisque rhoncus</p>
                    <p><span class="text-primary">✓</span> Lorem ipsum dolor</p>
                    <p><span class="text-primary">✓</span> Vivamus velit mir</p>
                    <p><span class="text-primary">✓</span> Elit mir ivamus</p>
                    <p><span class="text-primary">✓</span> Velit mir</p>
                    <p><span class="text-primary">✓</span> Quisque rhoncus</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 service">
                <div class="price-option mt-3">
                    <p><span class="text-primary">✓</span> Quisque rhoncus</p>
                    <p><span class="text-primary">✓</span> Lorem ipsum dolor</p>
                    <p><span class="text-primary">✓</span> Vivamus velit mir</p>
                    <p><span class="text-primary">✓</span> Elit mir ivamus</p>
                    <p><span class="text-primary">✓</span> Velit mir</p>
                    <p><span class="text-primary">✓</span> Quisque rhoncus</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="testimonial" class="padding-medium">
    <div class="container">
        <div class="section-title text-center mb-5">
            <p class="mb-2 fs-4 text-capitalize">Our Reviews</p>
            <h3>What Our Clients Says</h3>
        </div>
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
                                    <img class="img-fluid me-3" src="images/reviewer1.jpg" alt="reviewer">
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
                                    <img class="img-fluid me-3" src="images/reviewer2.jpg" alt="reviewer">
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
                                    <img class="img-fluid me-3" src="images/reviewer3.jpg" alt="reviewer">
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
                                    <img class="img-fluid me-3" src="images/reviewer1.jpg" alt="reviewer">
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

<section id="quote" class="bg-gray padding-small margin-medium mt-0">
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