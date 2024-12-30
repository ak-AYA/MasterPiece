@extends('website.main')
@section('title', 'Booking')
@section('content')

<style>
.booking-container {
    display: flex;
    gap: 20px;
    margin: 50px auto;
    max-width: 1200px;
}

.booking-details,
.booking-summary {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.booking-details {
    flex: 3;
}

.booking-summary {
    flex: 1.5;
}

.summary-header {
    font-weight: bold;
    border-bottom: 2px solid #ddd;
    margin-bottom: 15px;
    padding-bottom: 10px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.total-price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #007bff;
}

.btn-primary {
    width: 100%;
}
</style>

<section id="our-services" class="pt-2 mt-4">
    <div class="container mt-5">
        <h2 class="widget-title text-uppercase border-bottom mb-3 mt-5 text-center">Booking Details</h2>
        <div class="booking-container row">
            <!-- Booking Details Section (Left Side - 70%) -->
            <div class="col-lg-8 col-md-8 col-12 booking-details">
                <form action="{{ route('user.booking.checkout') }}" method="POST">
                    @csrf
                    <!-- User Details -->
                    <h5 class="mt-4">User Information</h5>
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" value="{{ $user->phone }}" readonly>
                        </div>
                        <div class="col-lg-6 col-md-6 mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" value="{{ $user->location }}"
                                readonly>
                        </div>
                    </div>
                    <hr>

                    <!-- Booking Details -->
                    <h5 class="mt-4">Booking Information</h5>
                    <div class="mb-3">
                        <label for="serviceType" class="form-label">Service Details</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mb-3">
                                <input type="text" class="form-control" id="categoryName"
                                    value="{{ session('booking')['service_name'] ?? '' }}" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mb-3">
                                <input type="text" class="form-control" id="serviceType"
                                    value="{{ number_format(session('booking')['price'], 2) }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="select-date" class="form-label">Select Date</label>
                            <div class="date" id="select-date">
                                <input name="select-date" class="form-label border-0 bg-transparent"
                                    value="{{ session('booking')['date'] ?? now()->format('Y-m-d') }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="select-time" class="form-label">Select Time</label>
                            <input type="time" name="time" class="form-control"
                                value="{{ session('booking')['time'] ?? '' }}" required>
                        </div>
                    </div>

                    <hr>
                    <button class="btn btn-primary mt-4">Proceed to Checkout</button>
                </form>
            </div>

            <!-- Booking Summary Section -->
            <div class="col-lg-4 col-md-4 col-12 booking-summary">
                <h4 class="summary-header pb-4">Booking Summary</h4>
                <div class="summary-item">
                    <span>Service Type:</span>
                    <span>{{ session('booking')['service_name'] }}</span>
                </div>
                <div class="summary-item">
                    <span>Date:</span>
                    <span>{{ session('booking')['date'] ?? ''  }}</span>
                </div>
                <div class="summary-item">
                    <span>Time:</span>
                    <span>{{ session('booking')['time'] ?? ''  }}</span>
                </div>
                <div class="summary-item">
                    <span>Price:</span>
                    <span>JD {{ number_format(session('booking')['price'], 2) }}</span>
                </div>
                <hr>
                <div class="summary-item total-price pt-5">
                    <span>Total:</span>
                    <span>JD {{ number_format(session('booking')['price'], 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection