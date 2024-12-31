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
        background: #F6F6F6;
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

    /* ----------- */
    /* General Form Styling */
    .form-label {
        font-size: 1rem;
    }

    .input-group {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
    }

    .input-group-text {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        padding: 0.5rem;
    }

    .form-control {
        padding: 0.8rem;
        font-size: 1rem;
        border: none;
        outline: none;
    }

    .form-control:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    .form-control .read {
        padding: 0.8rem;
        font-size: 1rem;
        border: none;
        outline: none;
    }

    .form-control:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    /* Icon Styling */
    .bi {
        font-size: 1.5rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .form-label {
            font-size: 0.9rem;
        }

        .input-group-text {
            font-size: 1rem;
        }

        .form-control {
            font-size: 0.9rem;
        }
    }

    .form-select {
        padding: 0.8rem;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .form-select:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        border-color: #007bff;
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
                    <input type="hidden" name="service_id" value="{{ $service->id }}">

                    <!-- Booking Details -->
                    <h5 class="mt-4">Booking Information</h5>
                    <div class="mb-3 row align-items-center">
                        <!-- Category Name -->
                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                            <label for="categoryName" class="form-label">Category</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-dark border-0"></span>
                                <input type="text" class="form-control" id="categoryName"
                                    value="{{ $service->category->name ?? '' }}" readonly>
                            </div>
                        </div>

                        <!-- Service Name -->
                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                            <label for="serviceType" class="form-label">Service Name</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-dark border-0"></span>
                                <input type="text" class="form-control" id="serviceType"
                                    value="{{ $service->name }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row align-items-center">
                        <!-- Date Input -->
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="date" class="form-label fw-bold">Select Date</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-primary text-white border-0">
                                    <i class="bi bi-calendar-date"></i>
                                </span>
                                <input type="date" id="select-date" name="date"
                                    class="form-control border-0 shadow-none"
                                    value="{{ now()->format('Y-m-d') }}" min="{{ now()->format('Y-m-d') }}" required>
                            </div>
                        </div>

                        <!-- Time Input -->
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label for="select-time" class="form-label fw-bold">Select Time</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-primary text-white border-0">
                                    <i class="bi bi-clock"></i>
                                </span>
                                <select id="select-time" name="time" class="form-select border-0 shadow-none" required>
                                    <option value="" disabled selected>Select a time</option>
                                    <!-- Morning Times -->
                                    <option value="07:00">7:00 AM</option>
                                    <option value="08:00">8:00 AM</option>
                                    <option value="09:00">9:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <!-- Afternoon Times -->
                                    <option value="12:00">12:00 PM</option>
                                    <option value="13:00">1:00 PM</option>
                                    <option value="14:00">2:00 PM</option>
                                    <option value="15:00">3:00 PM</option>
                                    <option value="16:00">4:00 PM</option>
                                    <!-- Evening Times -->
                                    <option value="17:00">5:00 PM</option>
                                    <option value="18:00">6:00 PM</option>
                                    <option value="19:00">7:00 PM</option>
                                    <option value="20:00">8:00 PM</option>
                                    <option value="21:00">9:00 PM</option>
                                    <option value="22:00">10:00 PM</option>
                                    <option value="23:00">11:00 PM</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="mb-3 row align-items-center">
                        <!-- Payment Method -->
                        <div class="mb-3">
                            <label for="payment_id" class="form-label">Payment</label>
                            <div class="input-group shadow-sm">
                                <select name="payment_id" class="form-select form-select-lg" required>
                                    <option value="" disabled selected>Select Payment Method</option>
                                    @foreach($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-primary mt-4 w-50  text-center">Proceed to Checkout</button>
                </form>
            </div>

            <!-- Booking Summary Section -->
            <div class="col-lg-4 col-md-4 col-12 booking-summary" style="background-color: #F6F6F6;">
                <h4 class="summary-header pb-4">Booking Summary</h4>
                <!-- User Details -->
                <div class="summary-item">
                    <span>Customer:</span>
                    <span>{{ $user->name }}</span>
                </div>
                <div class="summary-item">
                    <span>Phone:</span>
                    <span>{{ $user->phone}}</span>
                </div>
                <div class="summary-item">
                    <span>Location:</span>
                    <span>{{ $user->location }}</span>
                </div>
                <hr>
                <!-- Service Details -->
                <div class="summary-item">
                    <span>Service:</span>
                    <span>{{ $service->name }}</span>
                </div>

                <div class="summary-item">
                    <span>Provider:</span>
                    <span>{{ $service->provider->name ?? 'N/A' }}</span>
                </div>
                <div class="summary-item">
                    <span>Duration:</span>
                    <span>{{ $service->duration }} minutes</span>
                </div>

                <div class="summary-item">
                    <span>Price:</span>
                    <span>JD {{ number_format($service->price, 2) }}</span>
                </div>
                <hr>
                <div class="summary-item total-price pt-5">
                    <span>Total:</span>
                    <span>JD {{ number_format($service->price, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection