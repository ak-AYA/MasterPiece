@extends('website.main')
@section('title', 'User Login')
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


<section id="user-login" class="text-center py-5 mt-5" style="background-color: #ffffff;">
    <div class="container p-0 mt-5">
        <div class="row no-gutters">
            <!-- Left Section: Image with text -->
            <div class="col-md-5 col-lg-6 p-0" style="color:#fff">
                <div class="provider-login-image"
                    style="background-image: url('/assetts/images/comfy2.jpg'); height: 70vh; background-size: cover; background-position: center; display: flex; flex-direction: column; justify-content: center; color: #fff; text-align: center;">
                    <h3 class="text-uppercase" style="color:#000; text-shadow: 2px 2px 4px rgb(255, 255, 255);">Welcome back!</h3>
                    <p style="color:#000; text-shadow: 2px 2px 4px rgb(255, 255, 255);">Log in to manage your account and enjoy our services.</p>
                </div>
            </div>

            <!-- Right Section: Login Form -->
            <div class="col-md-7 col-lg-6 p-0">
                <div class="card shadow rounded-0 p-5" style="border-radius: 0; height: 70vh;">
                    <h3 class="mb-4">User Login</h3>
                    <div class="text-danger mt-3 d-none" id="userLoginError">Invalid email or password</div>
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
                            <div class="text-danger mt-1 d-none" id="userPasswordError">Password is required</div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-3">Login</button>
                    </form>
                    <p class="mt-3">Don't have an account? <a href="{{ route('website.register.user') }}" class="text-decoration-underline">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SweetAlert CSS (يجب أن تضيفه داخل <head> في صفحة HTML الخاصة بك) -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.23/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert JavaScript (يجب أن تضيفه في أسفل الصفحة أو في مكان مناسب بعد تحميل الصفحة) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.23/dist/sweetalert2.min.js"></script>

<script>
    document.getElementById("userLoginForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission

        // Reset previous errors
        resetErrors();

        // Simulate backend email and password check (you need to handle this in PHP or your backend logic)
        let isValid = true;

        const email = document.getElementById("userEmail").value;
        const password = document.getElementById("userPassword").value;

        // Simple client-side validation for demonstration purposes
        if (!validateEmail(email)) {
            document.getElementById("userEmailError").classList.remove("d-none");
            isValid = false;
        }

        if (!password) {
            document.getElementById("userPasswordError").classList.remove("d-none");
            isValid = false;
        }

        if (isValid) {
            // If the email and password are valid, proceed to submit the form
            this.submit();  // Submit the form to the server
        } else {
            // Show SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid email or password!',
                footer: '<a href="#">Why do I have this issue?</a>'
            });
        }
    });

    function resetErrors() {
        // Hide all error messages
        const errorElements = document.querySelectorAll(".text-danger");
        errorElements.forEach((element) => {
            element.classList.add("d-none");
        });
    }

    function validateEmail(email) {
        // Basic email validation
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return emailPattern.test(email);
    }
</script>




@endsection