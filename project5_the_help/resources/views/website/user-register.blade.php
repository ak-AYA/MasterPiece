@extends('website.main')
@section('title', ' User Register')
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


<section id="user-registration" class="py-5 mt-5" style="background-color: #ffffff;">
    <div class="container p-0 mt-5">
        <div class="row no-gutters">
            <!-- Left Section: Image with text -->
            <div class="col-md-5 col-lg-6 p-0" style="color:#fff">
                <div class="provider-login-image"
                    style="background-image: url('/assetts/images/comfy2.jpg'); height: 100vh; background-size: cover; background-position: center; display: flex; flex-direction: column; justify-content: center; color: #fff; text-align: center;">
                    <h3 class="text-uppercase" style="color:#000; text-shadow: 2px 2px 4px rgb(255, 255, 255);">Welcome!</h3>
                    <p style="color:#000; text-shadow: 2px 2px 4px rgb(255, 255, 255);">Create your account and explore our services.</p>
                </div>
            </div>

            <!-- Right Section: Registration Form -->
            <div class="col-md-7 col-lg-6 p-0">
                <div class="card shadow rounded-0 p-5" style="border-radius: 0; height: 100vh;">
                    <h3 class="mb-4">User Registration</h3>
                    <form method="POST" action="{{ route('website.register.user.submit') }}" id="userRegisterForm">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control w-100" name="name" id="userName" required placeholder="Enter your name">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control w-100" name="email" id="userEmail" required placeholder="Enter your email">
                            <div class="text-danger mt-1 d-none" id="userEmailError">Invalid email format</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control w-100" name="phone" id="userPhone" required placeholder="Enter your phone number">
                            <div class="text-danger mt-1 d-none" id="userPhoneError">Phone number must start with '07' and be 10 digits</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control w-100" name="location" id="userLocation" required placeholder="Enter your location">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3 text-start">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="userPassword" required placeholder="Create a password">
                                <div class="text-danger mt-1 d-none" id="passwordError">
                                    Password must be at least 8 characters, include a number and a special character.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 text-start">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="userPasswordConfirm" required placeholder="Confirm your password">
                                <div class="text-danger mt-1 d-none" id="confirmPasswordError">Passwords do not match</div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-3">Register</button>
                        <div class="text-danger mt-3 d-none" id="userRegisterError">An error occurred during registration</div>
                    </form>
                    <p class="mt-3">Already have an account? <a href="{{ route('website.login.user') }}" class="text-decoration-underline">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</section>



<script>
   document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('userRegisterForm');

    form.addEventListener('submit', function(event) {
        let isValid = true;

        // Check for email validity
        const emailInput = document.getElementById("userEmail");
        const emailError = document.getElementById("userEmailError");
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value.trim())) {
            emailError.classList.remove("d-none");
            isValid = false;
        } else {
            emailError.classList.add("d-none");
        }

        // Check for phone number validity
        const phoneInput = document.getElementById("userPhone");
        const phoneError = document.getElementById("userPhoneError");
        const phonePattern = /^07\d{8,10}$/;
        if (!phonePattern.test(phoneInput.value.trim())) {
            phoneError.classList.remove("d-none");
            isValid = false;
        } else {
            phoneError.classList.add("d-none");
        }

        // Check for password validity
        const passwordInput = document.getElementById("userPassword");
        const passwordError = document.getElementById("passwordError");
        const passwordPattern = /^(?=.*[!@#$%^&*])(?=.*\d)[a-zA-Z\d!@#$%^&*]{8,}$/;
        if (!passwordPattern.test(passwordInput.value.trim())) {
            passwordError.classList.remove("d-none");
            isValid = false;
        } else {
            passwordError.classList.add("d-none");
        }

        // Check for password confirmation match
        const passwordConfirmInput = document.getElementById("userPasswordConfirm");
        const passwordConfirmError = document.getElementById("confirmPasswordError");
        if (passwordInput.value.trim() !== passwordConfirmInput.value.trim()) {
            passwordConfirmError.classList.remove("d-none");
            isValid = false;
        } else {
            passwordConfirmError.classList.add("d-none");
        }

        // Prevent form submission if there are errors
        if (!isValid) {
            event.preventDefault();  
        }
    });
});

</script>


@endsection