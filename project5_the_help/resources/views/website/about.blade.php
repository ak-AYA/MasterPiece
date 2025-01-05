@extends('website.main')
@section('title', 'About Us')
@section('content')

<section id="about-us-1" class="position-relative mt-5 pt-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="imageblock me-4">
                    <img class="img-fluid rounded-4" src="{{ asset('assetts/images/team-item4.jpg') }}" alt="img">
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="section-title mb-4">
                    <p class="mb-2 fs-4 text-capitalize">Our Introduction</p>
                    <h3>Welcome To The Help</h3>
                </div>
                <p>Welcome to The Help, your ultimate destination for professional cleaning services designed to make
                    your life easier. Whether you’re a customer looking for a reliable cleaning solution or a provider
                    showcasing your expertise, The Help bridges the gap to ensure spotless spaces and happy customers.
                    <br><br>
                    At The Help, we focus on convenience, quality, and trust. Our dedicated providers use the best tools
                    and eco-friendly products to deliver exceptional cleaning services tailored to your needs. From
                    homes to offices, we transform every corner into a pristine haven, saving you time and ensuring your
                    satisfaction every step of the way.
                </p>
            </div>
        </div>
    </div>
</section>
<section id="image-text-section" class="py-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- Text Column -->
            <div class="col-md-6">
                <div class="section-title mb-4">
                    <p class="mb-2 fs-4 text-capitalize">Our Mission</p>
                    <h3>Striving for Excellence</h3>
                </div>
                <p>
                    At The Help, our mission is to provide unparalleled cleaning services that enhance your living and working spaces. 
                    With a commitment to eco-friendly practices and customer satisfaction, we ensure every corner is spotless.
                    <br><br>
                    We believe in building long-term relationships with our clients by consistently exceeding expectations. 
                    Your trust is our motivation, and we continuously strive for excellence.
                </p>
            </div>

            <!-- Image Column -->
            <div class="col-md-6">
                <div class="imageblock">
                    <img class="img-fluid rounded-4" src="{{ asset('assetts/images/video-image.jpg') }}" alt="Mission">
                </div>
            </div>

        </div>
    </div>
</section>

<section id="about-us-2" class="pb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="section-title mb-4">
                    <p class="mb-2 fs-4 text-capitalize">Our Achievements</p>
                    <h3>Why We Stand Out</h3>
                </div>
                <p>At The Help, we prioritize your satisfaction by customizing our services to match your unique
                    needs. With advanced tools and eco-friendly products, we ensure every corner of your space is
                    spotless and cared for with attention to detail.</p>
            </div>
            <div class="col-md-6 mt-4 mb-5">
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

<script>
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
