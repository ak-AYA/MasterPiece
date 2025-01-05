@extends('website.main')
@section('title', ' Provider Login')
@section('content')
<style>
    /* Remove padding from the container and row */
    .container.p-0 {
        padding: 0;
        max-width: 1100px;
        /* Limit the width of the container */
    }

    /* Ensure no gutters between columns */
    .row.no-gutters {
        margin-left: 0;
        margin-right: 0;
    }

    /* Remove padding from columns */
    .col-md-5.p-0,
    .col-lg-6.p-0 {
        padding: 0;
    }

    /* Ensure equal height for both sections and reduce height */
    .provider-login-image {
        height: 80vh;
        /* Reduced height for image section */
    }

    .card {
        height: 80vh;
        /* Reduced height for form section */
    }
</style>

<section id="provider-login" class="text-center mt-5 py-5" style="background-color: #ffffff;">
    <div class="container p-0 mt-5">
        <div class="row no-gutters">
            <!-- Left Section: Image with text -->
            <div class="col-md-5 col-lg-6 p-0" style="color:#fff">
                <div class="provider-login-image"
                    style="background-image: url('/assetts/images/pexels-matilda-wormwood-4098783.jpg'); height: 70vh; background-size: cover; background-position: center; display: flex; flex-direction: column; justify-content: center; color: #fff; text-align: center;">
                    <h3 class="text-uppercase" style="color:#fff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Welcome back!</h3>
                    <p style="color:#fff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Log in to manage your cleaning services, connect with clients, and grow your business.</p>
                </div>
            </div>

            <!-- Right Section: Login Form -->
            <div class="col-md-7 col-lg-6 p-0">
                <div class="card shadow rounded-0 p-5" style="border-radius: 0; height: 70vh;">
                    <h3 class="mb-4">Provider Login</h3>
                    <form method="POST" action="{{ route('website.login.provider.submit') }}" id="providerLoginForm">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="providerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control w-100" name="email" id="providerEmail" required
                                placeholder="Enter your email">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="providerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control w-100" name="password" id="providerPassword"
                                required placeholder="Enter your password">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm mt-3">Login</button>
                        <div class="text-danger mt-3 d-none" id="providerLoginError"></div>
                    </form>
                    <p class="mt-3">Don't have an account? <a href="{{ route('website.register.provider') }}"
                            class="text-decoration-underline">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    document.getElementById("providerLoginForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission

        // Reset previous errors
        resetErrors();

        // Simulate backend email and password check (you need to handle this in PHP or your backend logic)
        let isValid = true;
        
        // Send email and password to server to verify in the database
        // For now, we simulate with placeholder data.
        const email = document.getElementById("providerEmail").value;
        const password = document.getElementById("providerPassword").value;

        if (isValid) {
            // If the email and password are valid, proceed to submit the form
            this.submit();  // Submit the form to the server
        }
    });

    function resetErrors() {
        // Hide all error messages
        const errorElements = document.querySelectorAll(".text-danger");
        errorElements.forEach((element) => {
            element.classList.add("d-none");
        });
    }
</script>




@endsection