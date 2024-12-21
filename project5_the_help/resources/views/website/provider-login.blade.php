@extends('website.main')
@section('title', ' Provider Login')
@section('content')



<section id="provider-login" class="text-center py-5" style="background-color: #ffffff;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4 p-5">
                    <h3 class="mb-4">Provider Login</h3>
                    <form method="POST" action="{{ route('website.login.provider.submit') }}" id="providerLoginForm">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="providerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control w-100" name="email" id="providerEmail" required placeholder="Enter your email">
                            <div class="text-danger mt-1 d-none" id="providerEmailError">Invalid email format</div>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="providerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control w-100" name="password" id="providerPassword" required placeholder="Enter your password">
                            <div class="text-danger mt-1 d-none" id="providerPasswordError">
                                Password must be at least 8 characters, include a number and a special character.
                            </div>
                        </div>
                        <div class="form-check mb-3 text-start">
                            <input type="checkbox" class="form-check-input" name="remember" id="providerRemember">
                            <label for="providerRemember" class="form-check-label">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        <div class="text-danger mt-3 d-none" id="providerLoginError">Invalid email or password</div>
                    </form>
                    <p class="mt-3">Don't have an account? <a href="{{ route('website.register.provider') }}" class="text-decoration-underline">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
document.getElementById("providerLoginForm").addEventListener("submit", function (event) {
    let isValid = true;

    // Email validation
    const emailInput = document.getElementById("providerEmail");
    const emailError = document.getElementById("providerEmailError");
    if (emailInput.value.trim() === "") {
        emailError.textContent = "Email is required.";
        emailError.classList.remove("d-none");
        isValid = false;
    } else {
        emailError.classList.add("d-none");
    }

    // Password validation
    const passwordInput = document.getElementById("providerPassword");
    const passwordError = document.getElementById("providerPasswordError");
    if (passwordInput.value.trim() === "") {
        passwordError.textContent = "Password is required.";
        passwordError.classList.remove("d-none");
        isValid = false;
    } else {
        passwordError.classList.add("d-none");
    }

    // Prevent form submission if validation fails
    if (!isValid) {
        event.preventDefault();
    }
});

</script>



@endsection