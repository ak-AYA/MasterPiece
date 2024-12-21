@extends('website.main')
@section('title', 'User Login')
@section('content')



<section id="user-login" class="text-center py-5" style="background-color: #ffffff;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4 p-4">
                    <h3 class="mb-4">User Login</h3>
                    <form method="POST" action="{{ route('website.login.user.submit') }}" id="userLoginForm">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control w-100" name="email" id="userEmail" required placeholder="Enter your email">
                            <div class="text-danger mt-1 d-none" id="userEmailError">Invalid email format</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control w-100" name="password" id="userPassword" required placeholder="Enter your password">
                            <div class="text-danger mt-1 d-none" id="userPasswordError">
                                Password must be at least 8 characters, include a number and a special character.
                            </div>
                        </div>
                        <div class="form-check mb-3 text-start">
                            <input type="checkbox" class="form-check-input" name="remember" id="userRemember">
                            <label for="remember" class="form-check-label">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        <div class="text-danger mt-3 d-none" id="userLoginError">Invalid email or password</div>
                    </form>
                    <p class="mt-3">Don't have an account? <a href="{{ route('website.register.user') }}" class="text-decoration-underline">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('userLoginForm');

        form.addEventListener('submit', function(event) {
            let isValid = true;

            const emailInput = document.getElementById("userEmail");
            const emailError = document.getElementById("userEmailError");
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(emailInput.value.trim())) {
                emailError.classList.remove("d-none");
                isValid = false;
            } else {
                emailError.classList.add("d-none");
            }

            const passwordInput = document.getElementById("userPassword");
            const passwordError = document.getElementById("userPasswordError");
            const passwordPattern = /^(?=.*[!@#$%^&*])(?=.*\d)[a-zA-Z\d!@#$%^&*]{8,}$/;
            if (!passwordPattern.test(passwordInput.value.trim())) {
                passwordError.classList.remove("d-none");
                isValid = false;
            } else {
                passwordError.classList.add("d-none");
            }

            if (!isValid) {
                event.preventDefault();  
            }
        });
    });
</script>


@endsection