@extends('website.main')
@section('title', ' Provider Register')
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
        height: 100vh;
        /* Reduced height for image section */
    }

    .card {
        height: 100vh;
        /* Reduced height for form section */
    }
</style>


<section id="provider-register" class="text-center mt-5 py-5" style="background-color: #ffffff;">
    <div class="container p-0 mt-5">
        <div class="row no-gutters">
            <!-- Left Section: Image with text -->
            <div class="col-md-5 col-lg-6 p-0" style="color:#fff">
                <div class="provider-login-image"
                    style="background-image: url('/assetts/images/pexels-matilda-wormwood-4098783.jpg'); height: 100vh; background-size: cover; background-position: center; display: flex; flex-direction: column; justify-content: center; color: #fff; text-align: center;">
                    <h3 class="text-uppercase" style="color:#fff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Become a
                        trusted provider!</h3>
                    <p style="color:#fff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">Join our platform to offer
                        top-notch cleaning services, expand your clientele, and grow your business.</p>

                </div>
            </div>

            <!-- Right Section: Registration Form -->
            <div class="col-md-7 col-lg-6 p-0">
                <div class="card shadow rounded-0 p-5" style="border-radius: 0; height: 100vh;">
                    <h3 class="mb-2">Provider Registration</h3>
                    <form method="POST" action="{{ route('website.register.provider.submit') }}" id="registerForm">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control w-100" name="name" id="name" required
                                placeholder="Enter your name">
                            <div class="text-danger mt-1 d-none" id="nameError">Name is required.</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control w-100" name="email" id="email" required
                                placeholder="Enter your email">
                            <div class="text-danger mt-1 d-none" id="emailError">Invalid email format.</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3 text-start">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control w-100" name="phone" id="phone" required
                                    maxlength="15" placeholder="Enter your phone number">
                                <div class="text-danger mt-1 d-none" id="phoneError">Phone number must be 15 digits or
                                    less.</div>
                            </div>
                            <div class="col-md-6 mb-3 text-start">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control w-100" name="location" id="location" required
                                    placeholder="Enter your location">
                                <div class="text-danger mt-1 d-none" id="locationError">Location is required.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3 text-start">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required placeholder="Create a password">
                                <div class="text-danger mt-1 d-none" id="passwordError">
                                    Password must be at least 8 characters, include a number and a special character.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 text-start">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required placeholder="Confirm your password">
                                <div class="text-danger mt-1 d-none" id="confirmPasswordError">Passwords do not match.</div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>

                    <p class="mt-3">Already have an account? <a href="{{ route('website.login.provider') }}"
                            class="text-decoration-underline">Login here</a></p>
                </div>
            </div>

        </div>
    </div>
</section>


<script>
    document.getElementById("registerForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission
        let isValid = true;

        // Reset errors
        resetErrors();

        // Name validation
        let name = document.getElementById("name").value;
        if (!name) {
            showError("nameError", "Name is required.");
            isValid = false;
        }

        // Email validation
        let email = document.getElementById("email").value;
        let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!email || !emailPattern.test(email)) {
            showError("emailError", "Invalid email format.");
            isValid = false;
        }

        // Phone validation
        let phone = document.getElementById("phone").value;
        let phonePattern = /^07[7-9][0-9]{7}$/;
        if (!phone || !phonePattern.test(phone)) {
            showError("phoneError", "Phone number must be 15 digits or less.");
            isValid = false;
        }

        // Location validation
        let location = document.getElementById("location").value;
        if (!location) {
            showError("locationError", "Location is required.");
            isValid = false;
        }

        // Password validation
        let password = document.getElementById("password").value;
        let passwordPattern = /^(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
        if (!password || !passwordPattern.test(password)) {
            showError("passwordError", "Password must be at least 8 characters, include a number and a special character.");
            isValid = false;
        }

        // Confirm Password validation
        let confirmPassword = document.getElementById("confirmPassword").value;
        if (password !== confirmPassword) {
            showError("confirmPasswordError", "Passwords do not match.");
            isValid = false;
        }

        // If all validations are successful, submit the form
        if (isValid) {
            this.submit();  // Submit the form
        }
    });

    function showError(id, message) {
        document.getElementById(id).classList.remove("d-none");
        document.getElementById(id).textContent = message;
    }

    function resetErrors() {
        // Hide all error messages
        const errorElements = document.querySelectorAll(".text-danger");
        errorElements.forEach((element) => {
            element.classList.add("d-none");
        });
    }
</script>


@endsection