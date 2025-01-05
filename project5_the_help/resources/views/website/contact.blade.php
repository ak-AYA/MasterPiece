@extends('website.main')
@section('title', 'Contact Us')
@section('content')

<section id="contact-us" class="bg-light text-center mt-5 pt-5">
    <div class="container mt-4">

        <div class="section-title text-center">
            <p class="mb-2 fs-4 text-capitalize">Get In Touch</p>
            <h3>Contact Us</h3>
            <p class="text-muted mb-4">We'd love to hear from you! Whether you have a question, feedback, or need
                assistance, our team is here to help.</p>
        </div>
        <div class="row align-items-stretch pt-4">
            <!-- Map -->
            <div class="col-lg-6">
                <div class="mapouter h-100">
                    <div class="gmap_canvas h-100">
                        <iframe width="100%" height="100%"
                            src="https://maps.google.com/maps?q=32.015049,35.923891&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6 d-flex align-items-center">
                <div class="contact-form w-100 bg-white p-4 rounded shadow-sm">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form action="{{ route('website.contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control p-3" placeholder="Full Name"
                                value="{{ old('name') }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control p-3" placeholder="Email"
                                value="{{ old('email') }}" required>
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="message" class="form-control p-3" rows="5" placeholder="Your Message"
                                required>{{ old('message') }}</textarea>
                            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button type="submit"
                            class="btn btn-medium btn-primary btn-pill mt-3 text-uppercase">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Information Section -->
    <div id="contact-info" class="py-5 mt-5 bg-accent-gradient">
        <div class="row">
            <!-- Phone Icon and Info -->
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <!-- FontAwesome Phone Icon -->
                <i class="fas fa-phone-alt me-3" style="font-size: 50px; color: lightblue;"></i>
                <div class="contact-info-text ms-3">
                    <h5 class="text-light mb-0">Give Us Call</h5>
                    <h5 class="fw-light text-light">123 456 7891</h5>
                </div>
            </div>

            <!-- Email Icon and Info -->
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <!-- FontAwesome Email Icon -->
                <i class="fas fa-envelope me-3" style="font-size: 50px; color: lightblue;"></i>
                <div class="contact-info-text ms-3">
                    <h5 class="text-light mb-0">Email Us</h5>
                    <h5 class="fw-light text-light"><a href="mailto:example@email.com"
                            class="text-light">example@email.com</a></h5>
                </div>
            </div>

            <!-- Location Icon and Info -->
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <!-- FontAwesome Location Icon -->
                <i class="fas fa-map-marker-alt me-3" style="font-size: 50px; color: lightblue;"></i>
                <div class="contact-info-text ms-3">
                    <h5 class="text-light mb-0">Business Hours: </h5>
                    <h5 class="fw-light text-light">
                         Sunday to Friday,<br> 9:00 AM - 4:00 PM
                    </h5>
                </div>

            </div>
        </div>
    </div>


</section>

@endsection