@extends('website.main')
@section('title', ' Provider Register')
@section('content')


<section id="provider-register" class="text-center py-5" style="background-color: #ffffff;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4 p-5">
                    <h3 class="mb-4">Provider Registration</h3>
                    <form method="POST" action="{{ route('website.register.provider.submit') }}" id="registerForm">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control w-100" name="name" id="name" required placeholder="Enter your name">
                            <div class="text-danger mt-1 d-none" id="nameError">Name is required</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control w-100" name="email" id="email" required placeholder="Enter your email">
                            <div class="text-danger mt-1 d-none" id="emailError">Invalid email format</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control w-100" name="phone" id="phone" required maxlength="15" placeholder="Enter your phone number">
                            <div class="text-danger mt-1 d-none" id="phoneError">Phone number must be less than 15 digits</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control w-100" name="location" id="location" required placeholder="Enter your location">
                            <div class="text-danger mt-1 d-none" id="locationError">Location is required</div>
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
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required placeholder="Confirm your password">
                                <div class="text-danger mt-1 d-none" id="confirmPasswordError">Passwords do not match</div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <p class="mt-3">Already have an account? <a href="{{ route('website.login.provider') }}" class="text-decoration-underline">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById("registerForm").addEventListener("submit", function(event) {
        let isValid = true;

        // Name validation
        const nameInput = document.getElementById("name");
        const nameError = document.getElementById("nameError");
        if (nameInput.value.trim() === "") {
            nameError.classList.remove("d-none");
            isValid = false;
        } else {
            nameError.classList.add("d-none");
        }

        // Email validation
        const emailInput = document.getElementById("email");
        const emailError = document.getElementById("emailError");
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value.trim())) {
            emailError.classList.remove("d-none");
            isValid = false;
        } else {
            emailError.classList.add("d-none");
        }

        // Phone validation
        const phoneInput = document.getElementById("phone");
        const phoneError = document.getElementById("phoneError");
        if (phoneInput.value.trim().length > 15) {
            phoneError.classList.remove("d-none");
            isValid = false;
        } else {
            phoneError.classList.add("d-none");
        }

        // Password validation
        const passwordInput = document.getElementById("password");
        const passwordError = document.getElementById("passwordError");
        const passwordPattern = /^(?=.*[!@#$%^&*])(?=.*\d)[a-zA-Z\d!@#$%^&*]{8,}$/;
        if (!passwordPattern.test(passwordInput.value.trim())) {
            passwordError.classList.remove("d-none");
            isValid = false;
        } else {
            passwordError.classList.add("d-none");
        }

        // Confirm password validation
        const confirmPasswordInput = document.getElementById("password_confirmation");
        const confirmPasswordError = document.getElementById("confirmPasswordError");
        if (passwordInput.value.trim() !== confirmPasswordInput.value.trim()) {
            confirmPasswordError.classList.remove("d-none");
            isValid = false;
        } else {
            confirmPasswordError.classList.add("d-none");
        }

        if (!isValid) {
            event.preventDefault(); // Stop form submission if validation fails
        }
    });
</script>


@endsection